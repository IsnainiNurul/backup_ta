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
        // return 
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
            $process = shell_exec("python3 test.py ". $command." ".strval($request->training));}
        if($request->model =='ARIMA'){
            $process = shell_exec("python3 arima.py ". $tanggal_prediksi->diffInDays($last_date));
//	    return $process;
        }
	if($request->model =='Prophet'){
	    $process = shell_exec("python3 prophet.py ". $tanggal_prediksi->diffInDays($last_date));
	    

	}

	//return 'tes';
//	return $process;        
        // return $process;
        // $input = explode(";",$process);
    //    return 'jalan';
        // $lat = (float) $input[1];
        // $long = (float) $input[2];
        
        // $process = shell_exec("python arima.py ". $tanggal_prediksi->diffInDays($last_date));
        // $status = DB::statement("update status set status.status = '".$input[0]."',status.longitut = '".$long."',status.latitut ='".$lat."' where id = 1");
        $output_python =  explode("]",explode("[", $process)[1])[0] ;
        $output_python =  explode(" ",$output_python) ;
        $result= array_filter($output_python, fn($value) => !is_null($value) && $value !== ''); 
        $output_python = array_values($result);;
        // return $output_python ;
        $selisih = $tanggal_prediksi->diffInDays($last_date);
        // return $output_python;
        $tanggal = [];
        // array_push($tanggal)
        $sekarang =Carbon::createFromDate($request->last_date);
        $id = $request->last_id+1;
        array_push($tanggal,['id'=>$id,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[0]]);
        for ($x = 0; $x <$selisih ; $x++) {
            
        
            // echo "The number ".$sekarang." is: $x <br>";
          
            $sekarang = $sekarang->addDays(1);
        
            $object = (object)['id'=>$id+$x+1,'x'=>$sekarang->format('Y-m-d')." 00:00:00",'y'=>(int)$output_python[$x]];
            array_push($tanggal,$object);
            
        }
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
       if ($request->tipe == 'harian'){
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

       




        return view('prediksi_load',['count_conf'=>count($konfirmasi),'konfirmasi'=>$konfirmasi,'count_pred'=>$count_pred,'prediksi'=>$tanggal,'metode'=>$request->model,'real'=>$real,'count_real'=>$count_conf_real]);
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
        

        // if($request->model =='ARIMA'){
        //     $process = shell_exec("python arima.py ". $tanggal_prediksi->diffInDays($last_date));
        //           }

	    // if($request->model =='Prophet'){
	    // $process = shell_exec("python prophet.py ". $tanggal_prediksi->diffInDays($last_date));
	    

	    //           }

        $output_python =  explode("]",explode("[", $process)[1])[0] ;
        $output_python =  explode(" ",$output_python) ;
        $result= array_filter($output_python, fn($value) => !is_null($value) && $value !== ''); 
        $output_python = array_values($result);;
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

        $output_python =  explode("]",explode("[", $process)[1])[0] ;
        $output_python =  explode(" ",$output_python) ;
        $result= array_filter($output_python, fn($value) => !is_null($value) && $value !== ''); 
        $output_python = array_values($result);;
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

        $output_python =  explode("]",explode("[", $process)[1])[0] ;
        $output_python =  explode(" ",$output_python) ;
        $result= array_filter($output_python, fn($value) => !is_null($value) && $value !== ''); 
        $output_python = array_values($result);;
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
        
        return view('prediksi_load_semua',['count_conf'=>count($konfirmasi),'konfirmasi'=>$konfirmasi,'count_pred_svr'=>count($semua_hasil[0]),'count_pred_arima'=>count($semua_hasil[1]),'count_pred_prophet'=>count($semua_hasil[2]),'prediksi_svr'=>$semua_hasil[0],'prediksi_arima'=>$semua_hasil[1],'prediksi_prophet'=>$semua_hasil[2],'metode'=>$request->model,'real'=>$real,'count_real'=>$count_conf_real]);
       
    }

}


