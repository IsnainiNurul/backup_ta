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
            $process = shell_exec("python3 test.py ". $command);}
        if($request->model =='ARIMA'){
            $process = shell_exec("python3 arima.py ". $tanggal_prediksi->diffInDays($last_date));
//	    return $process;
        }
	if($request->model =='Prophet'){
	    $process = shell_exec("python3 prophet.py ". $tanggal_prediksi->diffInDays($last_date));
	    

	}

//	return 'tes';
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
        return view('prediksi_load',['count_conf'=>count($konfirmasi),'konfirmasi'=>$konfirmasi,'count_pred'=>count($tanggal),'prediksi'=>$tanggal,'metode'=>$request->model,'real'=>$real,'count_real'=>$count_conf_real]);
        // return $process;
        // return redirect('https://laravelkomber.azurewebsites.net/map');
    }
    
}
