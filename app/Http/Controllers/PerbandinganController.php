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

        
        $data = Tetangga::query();
        if($request->tetangga != null){
            $data = $data->where('id','=',$request->tetangga)->get();
        }
        else{
            
            $data = $data->where('id','=',2)->first();
        // $data = $data->first();
        };

        $tetangga = explode(",", $data->tetangga);
        // return count($tetangga);
        return view('perbandingan',['tetangga'=>$tetangga,'data'=>$data]);
    }
}
