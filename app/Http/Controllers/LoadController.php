<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Confirmed_case;
class LoadController extends Controller
{
    //
    public function index(Request $request)
    {

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
        $process = shell_exec("python test.py ". $command);
        // $input = explode(";",$process);
    //    return 'jalan';
        // $lat = (float) $input[1];
        // $long = (float) $input[2];
        
        // $status = DB::statement("update status set status.status = '".$input[0]."',status.longitut = '".$long."',status.latitut ='".$lat."' where id = 1");
        $output_python =  explode("]",explode("[", $process)[1])[0] ;
        $output_python =  explode(" ",$output_python) ;
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
        // return $tanggal;
        return view('prediksi_load',['count_conf'=>count($konfirmasi),'konfirmasi'=>$konfirmasi,'count_pred'=>count($tanggal),'prediksi'=>$tanggal]);
        // return $process;
        // return redirect('https://laravelkomber.azurewebsites.net/map');
    }
    
}
