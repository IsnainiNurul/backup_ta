<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataCovid19;
use App\Models\DataCovid19Harian;
use App\Models\DataCovid19Meninggal;
use App\Models\DataCovid19MeninggalHarian;
use App\Models\DataCovid19Sembuh;
use App\Models\DataCovid19SembuhHarian;
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
        $temp1='2020-03-17';
        $temp2= date('Y-m-d');
        $counter_date1=0;

        if($request->timeline =="Harian"){
        	$data = DataCovid19Harian::query();
        	$data_meninggal = DataCovid19MeninggalHarian::query();
        	$data_sembuh = DataCovid19SembuhHarian::query();

        }


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
         	$temp1='2020-03-17';
         	$cek1='2020-01-18';
         	$counter_date1=1;
         }
         if($request->dateend != null){
        	$data = $data->where('tanggal','<=',$request->dateend);
        	$data_meninggal = $data_meninggal->where('tanggal','<=',$request->dateend);
        	$data_sembuh = $data_sembuh->where('tanggal','<=',$request->dateend);
        	$berita = $berita->where('date','<=',$request->dateend);
        	$temp3=$request->dateend;
         }
         else{
         	$data = $data->where('tanggal','<=',date('Y-m-d'));
         	$data_meninggal = $data_meninggal->where('tanggal','<=',date('Y-m-d'));
         	$data_sembuh = $data_sembuh->where('tanggal','<=',date('Y-m-d'));
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         	$cek=$data_kasus2->orderBy('tanggal', 'DESC')->pluck('tanggal');
         	$temp2= date('Y-m-d');
         	$temp3=$cek[0];
         }

         if($temp1<'2020-03-18'){
         	$counter_date1=1;
         }
         $cek=$data_kasus2->orderBy('tanggal', 'DESC')->pluck('tanggal');
         if($temp3>=$cek[0]){
         	$cek=$data_kasus2->orderBy('tanggal', 'DESC')->pluck('tanggal');
         	$temp3=$cek[0];
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
	       		$provinsi= 'di yogyakarta';
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
	       $data_kasus2= $data_kasus2->where('tanggal','=',$temp3)->sum($request->area);
	       return $data_kasus2;
	       $data_meninggal2= $data_meninggal2->where('tanggal','=',$temp3)->sum($request->area);
	       $data_sembuh2= $data_sembuh2->where('tanggal','=',$temp3)->sum($request->area);
	       // $berita = $berita->where('area','=',$provinsi)->orderBy('date', 'ASC')->limit(100)->get();
	       $berita = $berita->where('area','=',$provinsi);
	     }
	     else{
	     	$data_kasus1= $data_kasus1->where('tanggal','=',$temp1)->sum('total'); 
	     	$data_meninggal1= $data_meninggal1->where('tanggal','=',$temp1)->sum('total');
	     	$data_sembuh1= $data_sembuh1->where('tanggal','=',$temp1)->sum('total');
	     	$data_kasus2= $data_kasus2->where('tanggal','=',$temp3)->sum('total');
	     	$data_meninggal2= $data_meninggal2->where('tanggal','=',$temp3)->sum('total');
	     	$data_sembuh2= $data_sembuh2->where('tanggal','=',$temp3)->sum('total');
	     	return $data_kasus2;
	     	$data = $data->select(DB::raw('tanggal as x, total as y'))->get();
	     	$data_sembuh = $data_sembuh->select(DB::raw('tanggal as x, total as y'))->get();
	     	$data_meninggal = $data_meninggal->select(DB::raw('tanggal as x, total as y'))->get();

	     	$berita = $berita->orderBy('date', 'DESC');
	     	$provinsi="semua";
	     }
	     
	     $berita = $berita->orderBy('date', 'DESC')->limit(100)->get();

	     if($counter_date1==1){
	     	$data_kasus1=0;
	     	$data_meninggal1=0;
	     	$data_sembuh1=0;

	     }
		 $totalkasus=$data_kasus2-$data_kasus1;
		 
		 $totalmeninggal=$data_meninggal2-$data_meninggal1;
		 $totalsembuh=$data_sembuh2-$data_sembuh1;

	  	if($request->datestart>date('Y-m-d')){$totalkasus=0;$totalmeninggal=0;$totalsembuh=0;}
	  	if($totalkasus<0){$totalkasus=0;}
	  	if($totalmeninggal<0){$totalmeninggal=0;}
	  	if($totalsembuh<0){$totalsembuh=0;}


    	return view('berita.berita',['tanggal_mulai'=>$temp2,'tanggal_selesai'=>$temp1,'data'=>$data,'berita'=>$berita,'data_meninggal'=>$data_meninggal,'data_sembuh'=>$data_sembuh,'totalkasus'=>number_format($totalkasus,0,',','.'),'totalmeninggal'=>number_format($totalmeninggal,0,',','.'),'totalsembuh'=>number_format($totalsembuh,0,',','.')]);
   	}
}
