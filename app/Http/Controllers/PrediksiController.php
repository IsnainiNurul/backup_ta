<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Confirmed_case;
use App\Models\Real_case;

class PrediksiController extends Controller
{

    public function index(Request $request)
    {
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
      //  return $konfirmasi;
       return view('prediksi',['konfirmasi'=>$konfirmasi,'count_conf'=>$count_conf,'real'=>$real,'count_real'=>$count_conf_real,'tipe'=>$request->tipe]);
    }
}
