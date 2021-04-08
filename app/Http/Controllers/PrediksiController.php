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
       return $konfirmasi;
       return view('prediksi',['konfirmasi'=>$konfirmasi,'count_conf'=>$count_conf,'real'=>$real,'count_real'=>$count_conf_real]);
    }
}
