<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataLabel;

class BeritaController extends Controller
{

    public function index(Request $request)
    {
               
        $label= DataLabel::query();

          if($request->datestart2 != null){
                $label = $label->where('tanggal','>=',$request->datestart);
         }
         else{
                $label = $label->where('tanggal','>=','2020-03-18');
         }
         if($request->dateend2 != null){
                $label = $label->where('tanggal','<=',$request->dateend);
         }
         else{
                $label = $label->where('tanggal','<=',date('Y-m-d'));
                $label = $label->where('date','<=',date('Y-m-d'));
         }
           
             $label = $label->select(DB::raw('SUM(`notification of information`) as Notification, SUM(donation as Donation,criticisms as Criticisms, hoax as Hoax, other as Other'))->get();
           
             // $nof = $label->sselect(DB::raw('SUM(`notification of information`) as Notification'))->get();
             // $donation = $label->select(DB::raw('SUM(donation) as Donation'))->get();
             // $criticisms = $label->select(DB::raw('SUM(criticisms) as Criticisms'))->get();
             // $hoax = $label->select(DB::raw('SUM(hoax) as Hoax'))->get();
             // $other = $label->select(DB::raw('SUM(other) as Other'))->get();
             //print($berita);

                 // $label_array=[$nof,$donation,$criticisms,$hoax,$other];
        //print($data);
          //    $label=substr($label,2, -2);
          //    $label_array=array();
          //    $label_array[]=$label;
          //    $keys = array('y', 'y', 'y','y','y');
                 // $values = array('45', '54', '25','34','12');
             $array = [{"x":"donation","y":"45"},{"x":"wiki","y":"24"},{"x":"do","y":"65"},{"x":"ok","y":"43"},{"x":"wkwk","y":"30"}];
             return $array;
        // return view('berita.berita',['label'=>$array]);
    }
}
