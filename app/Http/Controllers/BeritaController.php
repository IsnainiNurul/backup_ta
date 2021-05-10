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

class BeritaController extends Controller
{

    public function index(Request $request)
    {
               
        $data = DataCovid19::query();
        $data_kasus1 = DataCovid19::query();
        $data_kasus2 = DataCovid19::query();
        $berita = News::query();
        $label= DataLabel::query();

        if($request->datestart != null){
        	$data = $data->where('tanggal','>=',$request->datestart);
        	$berita = $berita->where('date','>=',$request->datestart);
        	$temp1=$request->datestart;
        	
         }
         else{
         	$data = $data->where('tanggal','>=','2020-03-18');
         	$berita = $berita->where('date','>=','2020-03-18');
         	$temp1='2020-03-18';
         	$cek1='2020-01-18';
         }
         if($request->dateend != null){
        	$data = $data->where('tanggal','<=',$request->dateend);
        	$berita = $berita->where('date','<=',$request->dateend);
        	$temp2=$request->dateend;
        	
         }
         else{
         	$data = $data->where('tanggal','<=',date('Y-m-d'));
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         	$cek=$data_kasus2->orderBy('tanggal', 'DESC')->pluck('tanggal');
         	$temp2=$cek[0];
         	$cek2=date('Y-m-d');
         	
         }

          if($request->datestart2 != null){
        	$label = $label->where('date','>=',$request->datestart);
         }
         else{
         	$label = $label->where('date','>=','2020-03-18');
         }
         if($request->dateend2 != null){
        	$label = $label->where('date','<=',$request->dateend);
         }
         else{
         	$label = $label->where('date','<=',date('Y-m-d'));
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
	       $data = $data->select(DB::raw('tanggal as x, ' . $request->area . ' as y'))->get();
	       $data_kasus1= $data_kasus1->where('tanggal','=',$temp1)->sum($request->area);
	       $data_kasus2= $data_kasus2->where('tanggal','=',$temp2)->sum($request->area);
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
	     	$data_kasus1= $data_kasus1->where('tanggal','=',$temp1)->sum(\DB::raw('Jatim + Jateng')); 
	     	$data_kasus2= $data_kasus2->where('tanggal','=',$temp2)->sum(\DB::raw('Jatim + Jateng'));
	     	$data = $data->select(DB::raw('tanggal as x, Jatim as y'))->get();
	     	$berita = $berita->orderBy('date', 'ASC');
	     	$provinsi="semua";
	     }
	     // if($request->label != null && $request->label != "Semua"){
	     //    $berita = $berita->where('label','=',$request->label) ; 
	     // }
	     
	     $berita = $berita->orderBy('date', 'ASC')->limit(10)->get();
	     // $label = $label->select(DB::raw('SUM(`notification of information`) as Notification, SUM(donation) as Donation,SUM(criticisms) as Criticisms, SUM(hoax) as Hoax, SUM(other) as Other'))->get();

	     // array_push($array_to, $label->)

	   
	     $nof = $label->select(DB::raw('SUM(`notification of information`) as Notification'))->get();
	     $donation = $label->select(DB::raw('SUM(donation) as Donation'))->get();
	     $criticisms = $label->select(DB::raw('SUM(criticisms) as Criticisms'))->get();
	     $hoax = $label->select(DB::raw('SUM(hoax) as Hoax'))->get();
	     $other = $label->select(DB::raw('SUM(other) as Other'))->get();

	     $nof=substr($nof,2, -2);
	     $donation=substr($donation,2, -2);
	     $criticisms=substr($criticisms,2, -2);
	     $hoax=substr($hoax,2, -2);
	     $other=substr($other,2, -2);


	     $nof=explode(":",$nof);
	     $donation=explode(":",$donation);
	     $criticisms=explode(":",$criticisms);
	     $hoax=explode(":",$hoax);
	     $other=explode(":",$other);
	     //print($berita);
	     $nof=substr($nof[1],1,-1);
	   	 $donation=substr($donation[1],1, -1);
	     $criticisms=substr($criticisms[1],1, -1);
	     $hoax=substr($hoax[1],1, -1);
	     $other=substr($other[1],1, -1);
	     
		 $totalkasus=$data_kasus2-$data_kasus1;
	  	 $label_array=[$nof,$donation,$criticisms,$hoax,$other];
        //print($data);
	  //    $label=substr($label,2, -2);
	  //    $label_array=array();
	  //    $label_array[]=$label;
	  //    $keys = array('y', 'y', 'y','y','y');
		 // $values = array('45', '54', '25','34','12');
	  //    $array = ['45', '54', '25','34','12'];
	     // $array = [{"x":"donation","y":"45"},{"x":"wiki","y":"24"},{"x":"do","y":"65"},{"x":"ok","y":"43"},{"x":"wkwk","y":"30"}];
        $process = shell_exec("python3 label.py ".$temp1." ".$temp2." ".$provinsi); 
        return ($process);
    	return view('berita.berita',['data'=>$data,'berita'=>$berita,'label'=>$label_array]);
   	}

}
