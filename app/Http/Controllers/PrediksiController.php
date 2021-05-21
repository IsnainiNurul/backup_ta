<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Confirmed_case;
use App\Models\Real_case;
use App\Models\All_case;

class PrediksiController extends Controller
{

    public function index(Request $request)
    {


      function to_daily($konfirmasi){
        $count = 0;
        $count_conf = count($konfirmasi);
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
         return $konfirmasi;
      }

      


      $konfirmasi = Confirmed_case::query();
      $real = Real_case::query();
       if($request->mulai != null){
         $konfirmasi = $konfirmasi->where('x','>',$request->mulai);
         }

      if($request->akhir != null){
        $konfirmasi = $konfirmasi->where('x','<',$request->akhir);
         }
         $konfirmasi = $konfirmasi->get();
         $real = $real->get();
         $count_conf = count($konfirmasi);
         $count_conf_real = count($real);
        $count = 0;

        $all = All_case::select('id','x','y')->get();
        $pra_vaksin = All_case::select('id','x','y')->where('keterangan','=','Pra Vaksinasi')->get();
        $vaksin = All_case::select('id','x','y')->where('keterangan','=','Vaksinasi')->get();

        $psbb = All_case::select('id','x','y')->where('keterangan2','=','PSBB')->get();

        if ($request->tipe == 'harian'){
          $all = to_daily($all);
          $pra_vaksin = to_daily($pra_vaksin);
          $vaksin = to_daily($vaksin);
          $psbb = to_daily($psbb);

       }



      //  $real = Real_case::get();
      //  return $real;
      //  return $all_case;
      //  return $konfirmasi;
       return view('prediksi',['psbb'=>$psbb,'all'=>$all,'pra_vaksin'=>$pra_vaksin,'vaksin'=>$vaksin,'konfirmasi'=>$konfirmasi,'count_conf'=>$count_conf,'real'=>$real,'count_real'=>$count_conf_real,'tipe'=>$request->tipe]);
    }
}
