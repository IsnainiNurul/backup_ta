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
    public function create()
    {
        return view('berita.tes');
    }
    public function makemodel()
    {
        $process= shell_exec("python3 makemodel.py"); 
        return $process;
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