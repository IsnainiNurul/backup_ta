<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tetangga;

class PerbandinganController extends Controller
{

    public function index(Request $request)
    {
        return view('berita',['tanggal'=>$tanggal,'jatim'=>$jatim,'jateng'=>$jateng,'jabar'=>$jabar]);
    }
}
