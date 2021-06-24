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

class StatistikBeritaController extends Controller
{

    public function index(Request $request)
    {
               
        $nof= News::query();
        $donation= News::query();
        $criticisms= News::query();
        $hoax= News::query();
        $other= News::query();
        $provinsi= '';
        if($request->datestart != null){
            $nof = $nof->where('date','>=',$request->datestart);
            $donation = $donation->where('date','>=',$request->datestart);
            $criticisms = $criticisms->where('date','>=',$request->datestart);
            $hoax = $hoax->where('date','>=',$request->datestart);
            $other = $other->where('date','>=',$request->datestart);
            $temp1=$request->datestart;
         }
         else{
            $nof = $nof->where('date','>=','2020-01-18');
            $donation = $donation->where('date','>=','2020-01-18');
            $criticisms = $criticisms->where('date','>=','2020-01-18');
            $hoax = $hoax->where('date','>=','2020-01-18');
            $other = $other->where('date','>=','2020-01-18');
            $temp1='2020-01-18';
         }
         if($request->dateend != null){
            $nof = $nof->where('date','<=',$request->dateend);
            $donation = $donation->where('date','<=',$request->dateend);
            $criticisms = $criticisms->where('date','<=',$request->dateend);
            $hoax = $hoax->where('date','<=',$request->dateend);
            $other = $other->where('date','<=',$request->dateend);
            $temp2=$request->dateend;
         }
         else{
            $nof = $nof->where('date','<=',date('Y-m-d'));
            $donation = $donation->where('date','<=',date('Y-m-d'));
            $criticisms = $criticisms->where('date','<=',date('Y-m-d'));
            $hoax = $hoax->where('date','<=',date('Y-m-d'));
            $other = $other->where('date','<=',date('Y-m-d'));
            $temp2=date('Y-m-d');
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
           $nof=$nof->where('label','=','notification of information')->where('area','=',$request->area)->count();
           $donation = $donation->where('label','=','donation')->where('area','=',$request->area)->count();
            $criticisms = $criticisms->where('label','=','criticisms')->where('area','=',$request->area)->count();
            $hoax = $hoax->where('label','=','hoax')->where('area','=',$request->area)->count();
            $other = $other->where('label','=','other')->where('area','=',$request->area)->count();
         }
         else{
            $nof=$nof->where('label','=','notification of information')->count();
           $donation = $donation->where('label','=','donation')->count();
            $criticisms = $criticisms->where('label','=','criticisms')->count();
            $hoax = $hoax->where('label','=','hoax')->count();
            $other = $other->where('label','=','other')->count();
            $provinsi= 'semua';
         //    $label = $label->select(DB::raw('SUM(`notification of information`) as Notification, SUM(donation) as Donation,SUM(criticisms) as Criticisms, SUM(hoax) as Hoax, SUM(other) as Other'))->get();
         }
         

         // $nof = $label->select(DB::raw('SUM(`notification of information`) as Notification'))->get();
         // $donation = $label->select(DB::raw('SUM(donation) as Donation'))->get();
         // $criticisms = $label->select(DB::raw('SUM(criticisms) as Criticisms'))->get();
         // $hoax = $label->select(DB::raw('SUM(hoax) as Hoax'))->get();
         // $other = $label->select(DB::raw('SUM(other) as Other'))->get();

         // $nof=substr($nof,2, -2);
         // $donation=substr($donation,2, -2);
         // $criticisms=substr($criticisms,2, -2);
         // $hoax=substr($hoax,2, -2);
         // $other=substr($other,2, -2);


         // $nof=explode(":",$nof);
         // $donation=explode(":",$donation);
         // $criticisms=explode(":",$criticisms);
         // $hoax=explode(":",$hoax);
         // $other=explode(":",$other);
         // //print($berita);
         // $nof=substr($nof[1],1,-1);
         // $donation=substr($donation[1],1, -1);
         // $criticisms=substr($criticisms[1],1, -1);
         // $hoax=substr($hoax[1],1, -1);
         // $other=substr($other[1],1, -1);
                  
         $label_array=[$nof,$donation,$criticisms,$hoax,$other];

         $process1 = shell_exec("python3 word_frequency.py ".$temp1." ".$temp2." ".$provinsi);
         return $temp1;
         $process2 = shell_exec("python3 word_frequency_information.py ".$temp1." ".$temp2." ".$provinsi);  
         $process3 = shell_exec("python3 word_frequency_donation.py ".$temp1." ".$temp2." ".$provinsi);
         $process4 = shell_exec("python3 word_frequency_criticisms.py ".$temp1." ".$temp2." ".$provinsi);  
         $process5 = shell_exec("python3 word_frequency_hoax.py ".$temp1." ".$temp2." ".$provinsi); 

         
         $word_array_all= explode(" ",$process1);
         $word_array_information= explode(" ",$process2);
         $word_array_donation= explode(" ",$process3);
         $word_array_criticisms= explode(" ",$process4);
         $word_array_hoax= explode(" ",$process5);


         $word_array_all[count($word_array_all)-1]=str_replace("\n","",end($word_array_all));
         $word_array_information[count($word_array_information)-1]=str_replace("\n","",end($word_array_information));
         $word_array_donation[count($word_array_donation)-1]=str_replace("\n","",end($word_array_donation));
         $word_array_criticisms[count($word_array_criticisms)-1]=str_replace("\n","",end($word_array_criticisms));
         $word_array_hoax[count($word_array_hoax)-1]=str_replace("\n","",end($word_array_hoax));

         $wordcloud_all=array();
         $wordcloud_information=array();
         $wordcloud_donation=array();
         $wordcloud_criticisms=array();
         $wordcloud_hoax=array();

         
         for ($x = 0; $x < 200; $x+=2) {
            $wordcloud_all[] = array('text' => $word_array_all[$x], 'weight' => $word_array_all[$x+1]);
            $wordcloud_information[] = array('text' => $word_array_information[$x], 'weight' => $word_array_information[$x+1]);
            $wordcloud_donation[] = array('text' => $word_array_donation[$x], 'weight' => $word_array_donation[$x+1]);
            $wordcloud_criticisms[] = array('text' => $word_array_criticisms[$x], 'weight' => $word_array_criticisms[$x+1]);
            $wordcloud_hoax[] = array('text' => $word_array_hoax[$x], 'weight' => $word_array_hoax[$x+1]);
         } 
        //  $process = "['wkwkk, wkwk']";
        // // $process = shell_exec("python label_windows.py ".$temp1." ".$temp2." ".$provinsi); 

        //  $tes=explode("]",$process);

        //  $tes[0]=substr($tes[0],1);
        //  $tes[1]=substr($tes[1],2);
        //  $tes[2]=substr($tes[2],2);
        //  $tes[3]=substr($tes[3],2,-1);
        
        //  $tes[0]=str_replace("'","",$tes[0]);
        //  $tes[1]=str_replace("'","",$tes[1]);
        //  $tes[2]=str_replace("'","",$tes[2]);
        //  $tes[3]=str_replace("'","",$tes[3]);
         

         if($provinsi=="semua"){
          $provinsi="Indonesia";
         }

         return view('berita.statistikberita',['label'=>$label_array,'provinsi'=>$provinsi,'wordcloud_all'=>$wordcloud_all,'wordcloud_information'=>$wordcloud_information,'wordcloud_donation'=>$wordcloud_donation,'wordcloud_criticisms'=>$wordcloud_criticisms,'wordcloud_hoax'=>$wordcloud_hoax]);
    }
}
