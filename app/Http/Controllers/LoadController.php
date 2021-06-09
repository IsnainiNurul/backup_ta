<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Confirmed_case;

use App\Models\Real_case;
class LoadController extends Controller
{
    //
    public function index(Request $request)
    {

        function Corr($x, $y){

            $length= count($x);
            $mean1=array_sum($x) / $length;
            $mean2=array_sum($y) / $length;
            
            $a=0;
            $b=0;
            $axb=0;
            $a2=0;
            $b2=0;
            
            for($i=0;$i<$length;$i++)
            {
            $a=$x[$i]-$mean1;
            $b=$y[$i]-$mean2;
            $axb=$axb+($a*$b);
            $a2=$a2+ pow($a,2);
            $b2=$b2+ pow($b,2);
            }
            
            $corr= $axb / sqrt($a2*$b2);
            
            return $corr;
            }
            // return $request;
        // return $request;
        $konfirmasi = Confirmed_case::query();
        if($request->mulai != null){
         $konfirmasi = $konfirmasi->where('x','>',$request->mulai);
          }
        if($request->akhir != null){
            $konfirmasi = $konfirmasi->where('x','<',$request->akhir);
            }
            $konfirmasi = $konfirmasi->get();
            $count_conf = count($konfirmasi);


        $tanggal_prediksi = Carbon::createFromDate($request->tanggal_prediksi);
        $last_date = Carbon::createFromDate($request->last_date);
        $akhir = $tanggal_prediksi->diffInDays($last_date) + $request->last_id;
        // return strval($akhir);
        $command = strval($akhir)." ".strval($request->last_id);
        // return $command;
        if($request->model =='Support Vector Regression'){
            $process = shell_exec("python3 test.py ". $command." ".strval($request->training));
	//	return $process;
		}
            
            if($request->model =='svrpso'){
                // return
                
                $command = strval($akhir)." ".strval($request->last_id-12);
                $process = shell_exec("python3 svrpso.py ". $command." ".strval($request->tipe));
                return $process;
                $r2 = (explode("%%",$process))[1];
                $process = (explode("%%",$process))[0];

            }
                // return $process;




        if($request->model =='ARIMA'){
            $process = shell_exec("python3 arima.py ". $tanggal_prediksi->diffInDays($last_date));
//	    return $process;
        }
	if($request->model =='Prophet'){
	    $process = shell_exec("python3 prophet.py ". $tanggal_prediksi->diffInDays($last_date));
	//return $process;	    

	}

	//return 'tes';
//	return $process;        
        // return $process;
        // $input = explode(";",$process);
    //    return 'jalan';
        // $lat = (float) $input[1];
        // $long = (float) $input[2];
        
        // $process = shell_exec("python3 arima.py ". $tanggal_prediksi->diffInDays($last_date));
        // $status = DB::statement("update status set status.status = '".$input[0]."',status.longitut = '".$long."',status.latitut ='".$lat."' where id = 1");
        $output_python =  explode("]",explode("[", $process)[1])[0] ;
        $output_python =  explode(" ",$output_python) ;
        $result= array_filter($output_python, fn($value) => !is_null($value) && $value !== ''); 
        $output_python = array_values($result);;
        // return $output_python3 ;
        $selisih = $tanggal_prediksi->diffInDays($last_date);
        // return $output_python;
        $tanggal = [];
        // array_push($tanggal)
        $ddd = [];
        $sekarang =Carbon::createFromDate($request->last_date);
        $id = $request->last_id+1;
        array_push($tanggal,['id'=>$id,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[0]]);
        // return $output_python;
        for ($x = 0; $x <$selisih ; $x++) {
            
        
            // echo "The number ".$sekarang." is: $x <br>";
          
            $sekarang = $sekarang->addDays(1);
        
            $object = (object)['id'=>$id+$x+1,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[$x]];
            array_push($ddd,(float)$output_python[$x]);
            array_push($tanggal,$object);
            
        }
        // return $tanggal;
        // $koleksi = [];
        // array_push($koleksi,collect($object));
        // array_push($koleksi,collect($object));
        // Storage::put('attempt1.json', $tanggal);
        $tanggal = collect($tanggal);
        
        $real = Real_case::query();
        $real = $real->get()->where('x','<',$request->tanggal_prediksi);
        $count_conf_real = count($real);
        // return $tanggal;

        
        $count = 0;
        if ($request->tipe == 'harian'){
        $y=[];
        foreach($konfirmasi as $x){
        // print($count);
        if($count == $count_conf-1){
         
          break;
        }
        array_push($y,$konfirmasi[$count]);
        
        $y[$count]->y =   $konfirmasi[$count+1]->y - $konfirmasi[$count]->y ;
        $count = $count+1;
        // echo $konfirmasi[$count]->y - $konfirmasi[$count-1]->y;
        
       }
        $konfirmasi = $y;
        $count_conf=$count_conf-1;

       }

       $count_pred = count($tanggal);

       $tanggal = collect($tanggal);
       $count = 0;
       if ($request->tipe == 'harian' && $request->model != 'svrpso'){
       $y=[];
       foreach($tanggal as $x){
       // print($count);
       if($count == $count_pred-1){
        
         break;
       }
       array_push($y,collect($tanggal[$count]));
    //    array_push($y,$tanggal[$count]);
    //    array_push($y,$tanggal[$count]);
    //    return $tanggal[$count+1]->y;
    // return $y[0]['y'];
    // return collect($tanggal[1])['y'];
       $temp1 = collect($tanggal[$count])['y'];
       $temp2 = collect($tanggal[$count+1])['y'];
       $temp3 = $temp2 - $temp1;
    //    return $y[$count]['y']=2;
    //    json_decode($y, true);
    //    print($count);
       $y[$count]->y =  $temp3 ;
    //    return $y[1]['y'];
       $count = $count+1;
       // echo $konfirmasi[$count]->y - $konfirmasi[$count-1]->y;
       
      }
    //   return $y[10]->y;
      for($xx = 0;$xx < count($y);$xx++){
          $y[$xx]['y'] = $y[$xx]->y;
      }
      $y[0]['y']=$y[1]['y'];
    //   return $y[30];
        // unset($y[0]);
       $tanggal = $y;
       $count_pred=$count_pred-1;

      }
       
      $count = 0;
      if ($request->tipe == 'harian'){
      $y=[];
      foreach($real as $x){
      // print($count);
      if($count == $count_conf_real-1){
       
        break;
      }
      array_push($y,$real[$count]);
      
      $y[$count]->y =   $real[$count+1]->y - $real[$count]->y ;
      $count = $count+1;
      // echo $konfirmasi[$count]->y - $konfirmasi[$count-1]->y;
      
     }
      $real = $y;
      $count_conf_real=$count_conf_real-1;

     }

       
    //  Corr($x,$y)
    $arr_x = [];
    $arr_y = [];
    $string_x ='';
    $string_y ='';
    // return $ddd;
    // return var_dump($tanggal);
    // return count($real); 
    for ($x=0;$x<count($real);$x++){
          array_push($arr_x,$real[$x]->y);
          array_push($arr_y,$ddd[$x]);
        $string_x = $string_x.'xx'. (string) $real[$x]->y;
        $string_y = $string_y.'xx'. (string) $ddd[$x];
     } 
    //  return $string_y;
    // $r2 = Corr($arr_x,$arr_y);
    //$r2 = 
    //  return $arr_x;
    //  return $arr_y;
//	return $string_x[0];
     $command = "python3 r2.py ".$string_x." ".$string_y;
//return $command;
	//$command = 'python3 r2.py a b';
//	return $command;
	//return $string_x;
//	//return  substr($string_x, 1); 
//	return $command;
//     return $string_x;
	//  $r2 = shell_exec($command);
    if($request->model != 'svrpso'){
     $r2 = 0;}
   //  $r2 = shell_exec("python3 r2.py a b"); 
	//  $r2 = (float) $r2;
    //  return $real;
    // return $r2;
        return view('prediksi_load',['r2'=>(float) $r2,'training'=>$request->training,'tanggal_prediksi'=>$request->tanggal_prediksi,'count_conf'=>count($konfirmasi),'konfirmasi'=>$konfirmasi,'count_pred'=>$count_pred,'prediksi'=>$tanggal,'metode'=>$request->model,'real'=>$real,'count_real'=>$count_conf_real]);
        // return $process;
        // return redirect('https://laravelkomber.azurewebsites.net/map');
    }
    


    
    public function all_algo(Request $request){
        

        $konfirmasi = Confirmed_case::query();
        if($request->mulai != null){
         $konfirmasi = $konfirmasi->where('x','>',$request->mulai);
          }
        if($request->akhir != null){
            $konfirmasi = $konfirmasi->where('x','<',$request->akhir);
            }
            $konfirmasi = $konfirmasi->get();
            $count_conf = count($konfirmasi);


        $tanggal_prediksi = Carbon::createFromDate($request->tanggal_prediksi);
        $last_date = Carbon::createFromDate($request->last_date);
        $akhir = $tanggal_prediksi->diffInDays($last_date) + $request->last_id;
        $semua_hasil = [];
        // return strval($akhir);
        $command = strval($akhir)." ".strval($request->last_id);
        // return $command;

        $process = shell_exec("python3 test.py ". $command);
        
//	return $process;

        // if($request->model =='ARIMA'){
        //     $process = shell_exec("python3 arima.py ". $tanggal_prediksi->diffInDays($last_date));
        //           }

	    // if($request->model =='Prophet'){
	    // $process = shell_exec("python3 prophet.py ". $tanggal_prediksi->diffInDays($last_date));
	    

	    //           }
//	return $process;
        $output_python =  explode("]",explode("[", $process)[1])[0] ;
        $output_python =  explode(" ",$output_python) ;
        $result= array_filter($output_python, fn($value) => !is_null($value) && $value !== ''); 
        $output_python3 = array_values($result);;
        $selisih = $tanggal_prediksi->diffInDays($last_date);
        $tanggal = [];
        $sekarang =Carbon::createFromDate($request->last_date);
        $id = $request->last_id+1;
        array_push($tanggal,['id'=>$id,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[0]]);

        for ($x = 0; $x <$selisih ; $x++) {
            $sekarang = $sekarang->addDays(1);
        
            $object = (object)['id'=>$id+$x+1,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[$x]];
            array_push($tanggal,$object);
            
        }
        $tanggal = collect($tanggal);
        
        $real = Real_case::query();
        $real = $real->get()->where('x','<',$request->tanggal_prediksi);
        $count_conf_real = count($real);

        array_push($semua_hasil,$tanggal);

        $process = shell_exec("python3 arima.py ". $tanggal_prediksi->diffInDays($last_date));

        $output_python3 =  explode("]",explode("[", $process)[1])[0] ;
        $output_python3 =  explode(" ",$output_python) ;
        $result= array_filter($output_python, fn($value) => !is_null($value) && $value !== ''); 
        $output_python3 = array_values($result);;
        $selisih = $tanggal_prediksi->diffInDays($last_date);
        $tanggal = [];
        $sekarang =Carbon::createFromDate($request->last_date);
        $id = $request->last_id+1;
        array_push($tanggal,['id'=>$id,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[0]]);

        for ($x = 0; $x <$selisih ; $x++) {
            $sekarang = $sekarang->addDays(1);
        
            $object = (object)['id'=>$id+$x+1,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[$x]];
            array_push($tanggal,$object);
            
        }
        $tanggal = collect($tanggal);
        
        $real = Real_case::query();
        $real = $real->get()->where('x','<',$request->tanggal_prediksi);
        $count_conf_real = count($real);

        array_push($semua_hasil,$tanggal);

        $process = shell_exec("python3 prophet.py ". $tanggal_prediksi->diffInDays($last_date));

        $output_python3 =  explode("]",explode("[", $process)[1])[0] ;
        $output_python3 =  explode(" ",$output_python) ;
        $result= array_filter($output_python, fn($value) => !is_null($value) && $value !== ''); 
        $output_python3 = array_values($result);;
        $selisih = $tanggal_prediksi->diffInDays($last_date);
        $tanggal = [];
        $sekarang =Carbon::createFromDate($request->last_date);
        $id = $request->last_id+1;
        array_push($tanggal,['id'=>$id,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[0]]);

        for ($x = 0; $x <$selisih ; $x++) {
            $sekarang = $sekarang->addDays(1);
        
            $object = (object)['id'=>$id+$x+1,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[$x]];
            array_push($tanggal,$object);
            
        }
        $tanggal = collect($tanggal);
        
        $real = Real_case::query();
        $real = $real->get()->where('x','<',$request->tanggal_prediksi);
        $count_conf_real = count($real);

        array_push($semua_hasil,$tanggal);

        $real = Real_case::query();
        $real = $real->get()->where('x','<',$request->tanggal_prediksi);
        $count_conf_real = count($real);
        // return count($tanggal[]);        
        
        return view('prediksi_load_semua',['tanggal_prediksi'=>$request->tanggal_prediksi,'count_conf'=>count($konfirmasi),'konfirmasi'=>$konfirmasi,'count_pred_svr'=>count($semua_hasil[0]),'count_pred_arima'=>count($semua_hasil[1]),'count_pred_prophet'=>count($semua_hasil[2]),'prediksi_svr'=>$semua_hasil[0],'prediksi_arima'=>$semua_hasil[1],'prediksi_prophet'=>$semua_hasil[2],'metode'=>$request->model,'real'=>$real,'count_real'=>$count_conf_real]);
       
    }

}


