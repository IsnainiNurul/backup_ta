<?php
 
namespace App\Http\Controllers;
use App\Models\NewsLabel;
use Illuminate\Http\Request;
 
class TesController extends Controller
{
    public function index()
    {
        return view('berita.model');
    }
    public function title(Request $request)
    {
        if($request->title!=null){
        $process= shell_exec("python predict.py ".$request->title);
        $hasil=explode(" ",$process);
        return view('berita.prediksi',['title'=>$request->title,'category'=>$hasil[0],'accuracy'=>$hasil[1]]);
        }
        else{
            return view('berita.prediksi',['title'=>"Tidak ada",'category'=>"Tidak ada",'accuracy'=>"Tidak ada"]);
        }
    }


    public function create()
    {
        return view('berita.tes');
    }
    
    public function makemodel()
    {
        $process= shell_exec("python makemodel_windows.py"); 
        return ($process);
    }
    public function logreg()
    {
        $process= shell_exec("python logreg_windows.py"); 
        return ($process);
    } 
    public function store()
    {
        // if($request->title=='null'){
        //  return view('berita.tes');
        // }
        // else{
        // $news= new NewsLabel;
        // $news->title = $request->title;
        // $news->kota = $request->kota;
        // $news->label = $request->label;
        // $news->save();
        // return view('berita.tes');
        // }

         NewsLabel::create([
            'title' => request('title'),
               'kota' => request ('kota'),
            'label' => request('label')
        ]);
         return view('berita.tes');
    }
}