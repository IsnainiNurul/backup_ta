<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataCovid19;

class BeritaController extends Controller
{

    public function index(Request $request)
    {
               
        $data = DataCovid19::query();
        if($request->datestart != null){
        $data = $data->where('tanggal','>',$request->datestart);
         }
         else{
         	$data = $data->where('tanggal','>','2020-03-18');
         }
	    if($request->dateend != null){
	        $data = $data->where('tanggal','<',$request->dateend);
	     }
	     else{
	     	$data = $data->where('tanggal','<',date('Y-m-d'));
	     }   
	    if($request->area != null){
	       $data = $data->select(DB::raw('tanggal as x, ' . $request->area . ' as y'))->get();
	     }
	     else{
	     	$data = $data->select(DB::raw('tanggal as x, Jatim as y'))->get();
	     }  
        //print($data);
        
        return view('berita.berita',['data'=>$data]);
    }
}
