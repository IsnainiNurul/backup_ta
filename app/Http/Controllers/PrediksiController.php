<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Confirmed_case;

class PrediksiController extends Controller
{

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
       return view('prediksi',['konfirmasi'=>$konfirmasi]);
    }
}
