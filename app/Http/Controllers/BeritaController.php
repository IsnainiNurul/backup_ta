<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataCovid19;

class BeritaController extends Controller
{

    public function index(Request $request)
    {
               
        $data = DataCovid19::all();   
         
        return view('berita.berita',['dates'=>$data]);
    }
}
