<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tetangga;
use App\Models\DataTetangga;

use App\Models\Temp_tanggal;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PerbandinganController extends Controller
{

    public function index(Request $request) // edit sini
    {


        function pearson_correlation($x,$y){
            if(count($x)!==count($y)){return -1;}   
            $x=array_values($x);
            $y=array_values($y);    
            $xs=array_sum($x)/count($x);
            $ys=array_sum($y)/count($y);    
            $a=0;$bx=0;$by=0;
            for($i=0;$i<count($x);$i++){     
                $xr=$x[$i]-$xs;
                $yr=$y[$i]-$ys;     
                $a+=$xr*$yr;        
                $bx+=pow($xr,2);
                $by+=pow($yr,2);
            }   
            $b = sqrt($bx*$by);
            return $a/$b;
        }


        // return 'sini';
        $kabupaten =Tetangga::select('kabupaten','id')->get();
        
        // return $data_all;
        $data = Tetangga::query();
        if($request->tetangga != null){
            $data = $data->where('id','=',$request->tetangga)->first();
            $id = $request->tetangga;
        }
        else{
            
            $data = $data->where('id','=',2)->first();
            $id = 2;
        // $data = $data->first();
        };
        // return ; 




        $data_all = DataTetangga::where('kabupaten','=',$data->kabupaten)->get();
        
        // return $data_all;
        
        for($hitung =0;$hitung < count($data_all);$hitung++){
            // return 'cek';
            
            $m1= str_replace(' ','',str_replace('[','',str_replace(']','',$data_all[$hitung]->m1)));
            $m2= str_replace(' ','',str_replace('[','',str_replace(']','',$data_all[$hitung]->m2)));
            
            $arr_m1 = array_map('intval',explode(",", $m1));
            $arr_m2 = array_map('intval',explode(",", $m2));
            $process = shell_exec("python3 regplot.py ".$data_all[$hitung]->id);
            // $process = str_replace('\n','',$process);
            $process = array_map('floatval',explode("%%", $process));
            // echo $data_all[$hitung]->id;
            // return $process;
            $slope=$process[0];
            $intercept=$process[1];
            // return $intercept;
            // return $process;
            
            // python 
            $pearson = pearson_correlation($arr_m1,$arr_m2);
            // return $pearson;
            $data_all[$hitung]->pearson = $pearson;
            $data_all[$hitung]->slope = $slope;
            $data_all[$hitung]->intercept = $intercept;
            // return $pearson;
        };
        // return $data_all;
        // return $data_all;
        // return pearson_correlation($data_all->m1,$data_all->m2);
        // return $data_all;
        $tetangga = explode(",", $data->tetangga);
        // return $data_all;
        // return 'siini';
        // return $data_all[0];
        // return count($tetangga);
        $tanggal = Temp_tanggal::where('id','=','1')->first();
        $mulai = $tanggal->mulai;
        $akhir= $tanggal->akhir;
    //    return $data_all;
        // return $data;
        return view('perbandingan',['akhir'=>$akhir,'mulai'=>$mulai,'tetangga'=>$tetangga,'data'=>$data,'kabupaten'=>$kabupaten,'pilihan'=>$data->kabupaten,'data_all'=>$data_all]);
    }



	public function update(Request $request){ //Jangan Diotak atik
    
    
        $tanggal = Temp_tanggal::where('id','=','1')->first();
        $tanggal->mulai= $request->mulai;
        $tanggal->akhir= $request->akhir;
        // return $request;
        $tanggal = $tanggal->update();
    
        // return $tanggal;
        $process = shell_exec("python3 tetangga.py ".$request->mulai." ".$request->akhir);
    
        return redirect()->back();
    
            
        }
        public function data(Request $request){ //Jangan Diotak atik
    
    
            
            return '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
             <table  class="table table-bordered">'.$request->text_html.'</table>';
        
                
            }
	public function regresi(Request $request){ //Jangan Diotak atik
        // return 'tes';
	$process = shell_exec("python linearreg.py ".$request->kota." ".$request->tetangga." ".$request->mulai." ".$request->akhir);
//	return $process;	
    return $process;
	$rmse = (explode("%%",$process))[1];
        $tanggal = (explode("%%",$process))[2];

        $process2 = (explode("%%",$process))[3];
	$process = (explode("%%",$process))[0];
		
	$output_python =  explode("]",explode("[", $process)[1])[0] ;
        $output_python =  explode(" ",$output_python) ;
	
	$output_python2 =  explode("]",explode("[", $process2)[1])[0] ;
        $output_python2 =  explode(" ",$output_python2) ;


	$result= array_filter($output_python, fn($value) => !is_null($value) && $value !== '');
        
        $output_python = array_values($result);
	$result2= array_filter($output_python2, fn($value) => !is_null($value) && $value !== '');
	$output_python2 = array_values($result2);
	echo "Training Tanggal ".$request->mulai."-->Hingga Tanggal ".$tanggal.'  ';
	echo "<br>Testing Tanggal ".$tanggal."-->Hingga Tanggal  ".$request->akhir.'  ';
	echo "<br>RMSE = ".$rmse."<br>";
	for($x=0;$x<count($output_python);$x++){
	echo "<br>";
	echo $x+1;
	echo "<br>";
	echo "<br>Real = ".$output_python[$x];
	echo "<br>Prediksi = ".$output_python2[$x];

	}
//	return $output_python;


       }


}

