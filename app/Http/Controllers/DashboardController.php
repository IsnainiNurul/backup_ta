<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataCovid19;
use App\Models\News;
use App\Models\DataLabel;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
               
        $data = DataCovid19::query();
        $berita = News::query();
        $label= DataLabel::query();

        if($request->datestart != null){
        	$data = $data->where('tanggal','>=',$request->datestart);
        	$berita = $berita->where('date','>=',$request->datestart);
        	
         }
         else{
         	$data = $data->where('tanggal','>=','2020-03-18');
         	$berita = $berita->where('date','>=','2020-03-18');
         }
         if($request->dateend != null){
        	$data = $data->where('tanggal','<=',$request->dateend);
        	$berita = $berita->where('date','<=',$request->dateend);
        	
         }
         else{
         	$data = $data->where('tanggal','<=',date('Y-m-d'));
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         }
        
	     if($request->kota != "Semua" && $request->kota != null){
	       	 $berita = $berita->where('kota','=',$request->kota);
	       }
	      else if($request->kota == "Other"){
	       	 $berita = $berita->where('kota','=',"");
	       }
	     
	     else{
	     	$data = $data->select(DB::raw('tanggal as x, Jatim as y'))->get();
	     	$berita = $berita->orderBy('date', 'ASC');
	     }
	     // if($request->label != null && $request->label != "Semua"){
	     //    $berita = $berita->where('label','=',$request->label) ; 
	     // }
	     
	     $berita = $berita->orderBy('date', 'ASC')->limit(10)->get();
	    
        return view('dashboard',['data'=>$data,'berita'=>$berita]);
    }

}
