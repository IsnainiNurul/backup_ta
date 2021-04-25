<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tetangga;
use App\Models\DataTetangga;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PerbandinganController extends Controller
{

    public function index(Request $request) // edit sini
    {

        
        $kabupaten =Tetangga::select('kabupaten','id')->get();
        
        // return $data_all;
        $data = Tetangga::query();
        if($request->tetangga != null){
            $data = $data->where('id','=',$request->tetangga)->first();
        }
        else{
            
            $data = $data->where('id','=',2)->first();
        // $data = $data->first();
        };
        // return ; 
        $data_all = DataTetangga::where('kabupaten','=',$data->kabupaten)->get();
        $tetangga = explode(",", $data->tetangga);
        // return 'siini';
        // return $data_all[0];
        // return count($tetangga);
        return view('perbandingan',['tetangga'=>$tetangga,'data'=>$data,'kabupaten'=>$kabupaten,'pilihan'=>$data->kabupaten,'data_all'=>$data_all]);
    }



	public function update(Request $request){ //Jangan Diotak atik

	$process = shell_exec("python3 tetangga.py ".$request->mulai." ".$request->akhir);

	return redirect()->back();

		
	}

}
