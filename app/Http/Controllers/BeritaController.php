<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataCovid19;
use App\Models\DataCovid19Meninggal;
use App\Models\DataCovid19Sembuh;
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
        $data_meninggal = DataCovid19Meninggal::query();
        $data_meninggal1 = DataCovid19Meninggal::query();
        $data_meninggal2 = DataCovid19Meninggal::query();
        $data_sembuh = DataCovid19Sembuh::query();
        $data_sembuh1 = DataCovid19Sembuh::query();
        $data_sembuh2 = DataCovid19Sembuh::query();
        $berita = News::query();
        $label= DataLabel::query();

        if($request->datestart != null){
        	$data = $data->where('tanggal','>=',$request->datestart);
        	$data_meninggal = $data_meninggal->where('tanggal','>=',$request->datestart);
        	$data_sembuh = $data_sembuh->where('tanggal','>=',$request->datestart);
        	$berita = $berita->where('date','>=',$request->datestart);
        	$temp1=$request->datestart;
        	
         }
         else{
         	$data = $data->where('tanggal','>=','2020-03-18');
         	$data_meninggal = $data_meninggal->where('tanggal','>=','2020-03-18');
         	$data_sembuh = $data_sembuh->where('tanggal','>=','2020-03-18');
         	$berita = $berita->where('date','>=','2020-03-18');
         	$temp1='2020-03-18';
         	$cek1='2020-01-18';
         }
         if($request->dateend != null){
        	$data = $data->where('tanggal','<=',$request->dateend);
        	$data_meninggal = $data_meninggal->where('tanggal','<=',$request->dateend);
        	$data_sembuh = $data_sembuh->where('tanggal','<=',$request->dateend);
        	$berita = $berita->where('date','<=',$request->dateend);
        	$temp2=$request->dateend;
        	
         }
         else{
         	$data = $data->where('tanggal','<=',date('Y-m-d'));
         	$data_meninggal = $data_meninggal->where('tanggal','<=',date('Y-m-d'));
         	$data_sembuh = $data_sembuh->where('tanggal','<=',date('Y-m-d'));
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         	$cek=$data_kasus2->orderBy('tanggal', 'DESC')->pluck('tanggal');
         	$temp2=$cek[0];
         }
         if($temp1<'2020-03-18'){
         	$temp1='2020-03-18';
         }
         if($temp2>=date('Y-m-d')){
         	$cek=$data_kasus2->orderBy('tanggal', 'DESC')->pluck('tanggal');
         	$temp2=$cek[0];
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
	       $data_meninggal = $data_meninggal->select(DB::raw('tanggal as x, ' . $request->area . ' as y'))->get();
	       $data_sembuh = $data_sembuh->select(DB::raw('tanggal as x, ' . $request->area . ' as y'))->get();
	       $data_kasus1= $data_kasus1->where('tanggal','=',$temp1)->sum($request->area);
	       $data_meninggal1= $data_meninggal1->where('tanggal','=',$temp1)->sum($request->area);
	       $data_sembuh1= $data_sembuh1->where('tanggal','=',$temp1)->sum($request->area);
	       $data_kasus2= $data_kasus2->where('tanggal','=',$temp2)->sum($request->area);
	       $data_meninggal2= $data_meninggal2->where('tanggal','=',$temp2)->sum($request->area);
	       $data_sembuh2= $data_sembuh2->where('tanggal','=',$temp2)->sum($request->area);
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
	     	$data_kasus1= $data_kasus1->where('tanggal','=',$temp1)->sum('total'); 
	     	$data_meninggal1= $data_meninggal1->where('tanggal','=',$temp1)->sum('total');
	     	$data_sembuh1= $data_sembuh1->where('tanggal','=',$temp1)->sum('total');
	     	$data_kasus2= $data_kasus2->where('tanggal','=',$temp2)->sum('total');
	     	$data_meninggal2= $data_meninggal2->where('tanggal','=',$temp2)->sum('total');
	     	$data_sembuh2= $data_sembuh2->where('tanggal','=',$temp2)->sum('total');
	     	

	     	$data = $data->select(DB::raw('tanggal as x, total as y'))->get();
	     	$data_sembuh = $data_sembuh->select(DB::raw('tanggal as x, total as y'))->get();
	     	$data_meninggal = $data_meninggal->select(DB::raw('tanggal as x, total as y'))->get();
	     	$berita = $berita->orderBy('date', 'DESC');
	     	$provinsi="semua";
	     }
	     // if($request->label != null && $request->label != "Semua"){
	     //    $berita = $berita->where('label','=',$request->label) ; 
	     // }
	     
	     $berita = $berita->orderBy('date', 'DESC')->limit(100)->get();
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
		 $totalmeninggal=$data_meninggal2-$data_meninggal1;
		 $totalsembuh=$data_sembuh2-$data_sembuh1;
	  	 $label_array=[$nof,$donation,$criticisms,$hoax,$other];
  //       $process = shell_exec("python3 label.py ".$temp1." ".$temp2." ".$provinsi); 
  //       $tes=explode("] ",$process);
		// $tes[0]=substr($tes[0],1);
		// $tes[1]=substr($tes[1],1);
		// $tes[2]=substr($tes[2],1);
		// $tes[3]=substr($tes[3],1,-1);
		// $tes[0]=str_replace("'","",$tes[0]);
		// $tes[1]=str_replace("'","",$tes[1]);
		// $tes[2]=str_replace("'","",$tes[2]);
		// $tes[3]=str_replace("'","",$tes[3]);
		// $criticism_key=explode(", ",$tes[0]);
		// $donation_key=explode(", ",$tes[1]);
		// $hoax_key=explode(", ",$tes[2]);
		// $nof_key=explode(", ",$tes[3]);
	  	if($request->datestart>date('Y-m-d')){$totalkasus=0;$totalmeninggal=0;$totalsembuh=0;}
	  	if($totalkasus<0){$totalkasus=0;}
	  	if($totalmeninggal<0){$totalmeninggal=0;}
	  	if($totalsembuh<0){$totalsembuh=0;}
    	return view('berita.berita',['data'=>$data,'berita'=>$berita,'label'=>$label_array,'data_meninggal'=>$data_meninggal,'data_sembuh'=>$data_sembuh,'totalkasus'=>number_format($totalkasus),'totalmeninggal'=>number_format($totalmeninggal),'totalsembuh'=>number_format($totalsembuh)]);
   	}
}
