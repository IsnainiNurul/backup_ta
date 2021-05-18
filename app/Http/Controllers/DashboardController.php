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

class DashboardController extends Controller
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

        if($request->datestart != null){
            $data = $data->where('tanggal','>=',$request->datestart);
            $data_meninggal = $data_meninggal->where('tanggal','>=',$request->datestart);
            $data_sembuh = $data_sembuh->where('tanggal','>=',$request->datestart);
            $temp1=$request->datestart;
            
         }
         else{
            $data = $data->where('tanggal','>=','2020-03-18');
            $data_meninggal = $data_meninggal->where('tanggal','>=','2020-03-18');
            $data_sembuh = $data_sembuh->where('tanggal','>=','2020-03-18');
            $temp1='2020-03-18';
            $cek1='2020-01-18';
         }
         if($request->dateend != null){
            $data = $data->where('tanggal','<=',$request->dateend);
            $data_meninggal = $data_meninggal->where('tanggal','<=',$request->dateend);
            $data_sembuh = $data_sembuh->where('tanggal','<=',$request->dateend);
            $temp2=$request->dateend;
            
         }
         else{
            $data = $data->where('tanggal','<=',date('Y-m-d'));
            $data_meninggal = $data_meninggal->where('tanggal','<=',date('Y-m-d'));
            $data_sembuh = $data_sembuh->where('tanggal','<=',date('Y-m-d'));
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
	   
	     $data_kasus1= $data_kasus1->where('tanggal','=',$temp1)->sum('total'); 
         $data_meninggal1= $data_meninggal1->where('tanggal','=',$temp1)->sum('total');
         $data_sembuh1= $data_sembuh1->where('tanggal','=',$temp1)->sum('total');
         $data_kasus2= $data_kasus2->where('tanggal','=',$temp2)->sum('total');
         $data_meninggal2= $data_meninggal2->where('tanggal','=',$temp2)->sum('total');
         $data_sembuh2= $data_sembuh2->where('tanggal','=',$temp2)->sum('total');
            

         $data = $data->select(DB::raw('tanggal as x, total as y'))->get();
         $data_sembuh = $data_sembuh->select(DB::raw('tanggal as x, total as y'))->get();
         $data_meninggal = $data_meninggal->select(DB::raw('tanggal as x, total as y'))->get();

         $totalkasus=$data_kasus2-$data_kasus1;
         $totalmeninggal=$data_meninggal2-$data_meninggal1;
         $totalsembuh=$data_sembuh2-$data_sembuh1;
         if($request->datestart>date('Y-m-d')){$totalkasus=0;$totalmeninggal=0;$totalsembuh=0;}
         if($totalkasus<0){$totalkasus=0;}
         if($totalmeninggal<0){$totalmeninggal=0;}
         if($totalsembuh<0){$totalsembuh=0;}

         return view('dashboard',['data'=>$data,'data_meninggal'=>$data_meninggal,'data_sembuh'=>$data_sembuh,'totalkasus'=>number_format($totalkasus,0,',','.'),'totalmeninggal'=>number_format($totalmeninggal,0,',','.'),'totalsembuh'=>number_format($totalsembuh,0,',','.')]);
    }

}
