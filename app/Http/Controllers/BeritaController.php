<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataCovid19;
use App\Models\News;
use App\Models\DataLabel;

class BeritaController extends Controller
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

          if($request->datestart2 != null){
        	$data = $data->where('tanggal','>=',$request->datestart);
        	$berita = $berita->where('date','>=',$request->datestart);
        	
         }
         else{
         	$data = $data->where('tanggal','>=','2020-03-18');
         	$berita = $berita->where('date','>=','2020-03-18');
         }
         if($request->dateend2 != null){
        	$data = $data->where('tanggal','<=',$request->dateend);
        	$berita = $berita->where('date','<=',$request->dateend);
        	
         }
         else{
         	$data = $data->where('tanggal','<=',date('Y-m-d'));
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         }
	    if($request->area != null && $request->area !="Semua"){

	       if($request->area=="Jatim"){
	       		$provinsi= 'jawa timur';
	       }
	       else if($request->area=="Jabar"){
	       		$provinsi= 'jawa barat';
	       }
	       else if($request->area=="Jateng"){
	       		$provinsi= 'jawa tengah';
	       }
	       else if($request->area=="DIY"){
	       		$provinsi= 'di_yogyakarta';
	       }
	       else if($request->area=="Jakarta"){
	       		$provinsi= 'dki jakarta';
	       }
	       else if($request->area=="Banten"){
	       		$provinsi= 'banten';
	       }
	       else if($request->area=="Aceh"){
	       		$provinsi= 'aceh';
	       }
	       else if($request->area=="Jambi"){
	       		$provinsi= 'jambi';
	       }
	       else if($request->area=="Sumut"){
	       		$provinsi= 'sumatera utara';
	       }
	       else if($request->area=="Sumbar"){
	       		$provinsi= 'sumatera barat';
	       }
	       else if($request->area=="Sumsel"){
	       		$provinsi= 'sumatera selatan';
	       }
	       else if($request->area=="Riau"){
	       		$provinsi= 'riau';
	       }
	       else if($request->area=="Kep_riau"){
	       		$provinsi= 'Kepulauan riau';
	       }
	       else if($request->area=="Babel"){
	       		$provinsi= 'bangka belitung';
	       }
	       else if($request->area=="Bengkulu"){
	       		$provinsi= 'bengkulu';
	       }
	       else if($request->area=="Lampung"){
	       		$provinsi= 'lampung';
	       }
	       else if($request->area=="Bali"){
	       		$provinsi= 'bali';
	       }
	       else if($request->area=="NTT"){
	       		$provinsi= 'nusa tenggara timur';
	       }
	       else if($request->area=="NTB"){
	       		$provinsi= 'nusa tenggara barat';
	       }
	       else if($request->area=="Kalbar"){
	       		$provinsi= 'kalimantan barat';
	       }
	       else if($request->area=="Kalsel"){
	       		$provinsi= 'kalimantan selatan';
	       }
	       else if($request->area=="Kaltim"){
	       		$provinsi= 'kalimantan timur';
	       }
	       else if($request->area=="Kaltara"){
	       		$provinsi= 'kalimantan utara';
	       }
	       else if($request->area=="Kalteng"){
	       		$provinsi= 'kalimantan tengah';
	       }
	       else if($request->area=="Sulut"){
	       		$provinsi= 'sulawesi utara';
	       }
	       else if($request->area=="Sulteng"){
	       		$provinsi= 'sulawesi tengah';
	       }
	       else if($request->area=="Sulbar"){
	       		$provinsi= 'sulawesi barat';
	       }
	       else if($request->area=="Sulsel"){
	       		$provinsi= 'sulawesi selatan';
	       }
	       else if($request->area=="Sultra"){
	       		$provinsi= 'sulawesi tenggara';
	       }
	       else if($request->area=="Gorontalo"){
	       		$provinsi= 'gorontalo';
	       }
	       else if($request->area=="Maluku"){
	       		$provinsi= 'maluku';
	       }
	       else if($request->area=="Malut"){
	       		$provinsi= 'maluku utara';
	       }
	       else if($request->area=="Papua"){
	       		$provinsi= 'papua';
	       }
	       else if($request->area=="Papbar"){
	       		$provinsi= 'papua barat';
	       }
	       else if($request->area=="Indonesia"){
	       		$provinsi= 'indonesia';
	       }

	       $data = $data->select(DB::raw('tanggal as x, ' . $request->area . ' as y'))->get();
	       // $berita = $berita->where('area','=',$provinsi)->orderBy('date', 'ASC')->limit(100)->get();
	       $berita = $berita->where('area','=',$provinsi);
	       if($request->kota != "Semua" && $request->kota != null){
	       	 $berita = $berita->where('kota','=',$request->kota);
	       }
	       else if($request->kota == "Other"){
	       	 $berita = $berita->where('kota','=',"");
	       }
	     }
	     else{
	     	$data = $data->select(DB::raw('tanggal as x, Jatim as y'))->get();
	     	$berita = $berita->orderBy('date', 'ASC');
	     }
	     // if($request->label != null && $request->label != "Semua"){
	     //    $berita = $berita->where('label','=',$request->label) ; 
	     // }
	     
	     $berita = $berita->orderBy('date', 'ASC')->limit(10)->get();
	     $label = $label->select(DB::raw('SUM(`notification of information`) as Notification, SUM(donation) as Donation,SUM(criticisms) as Criticisms, SUM(hoax) as Hoax, SUM(other) as Other'))->get();
	     // $nof = $label->select(DB::raw('SUM(`notification of information`) as Notification'))->get();
	     // $donation = $label->select(DB::raw('SUM(donation) as Donation'))->get();
	     // $criticisms = $label->select(DB::raw('SUM(criticisms) as Criticisms'))->get();
	     // $hoax = $label->select(DB::raw('SUM(hoax) as Hoax'))->get();
	     // $other = $label->select(DB::raw('SUM(other) as Other'))->get();
	     //print($berita);

        //print($data);
        return ($label);
        //return view('berita.berita',['data'=>$data,'berita'=>$berita,'label'=>$label]);
    }
}
