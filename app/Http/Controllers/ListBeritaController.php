<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\DataLabel;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ListBeritaController extends Controller
{

    public function index(Request $request)
    {
               

        $berita = News::query();
        $label= DataLabel::query();
        $city="";
        $provinsi="";
        $kota= array();
        if($request->datestart != null){
        	$berita = $berita->where('date','>=',$request->datestart);
        	
         }
         else{
         	$berita = $berita->where('date','>=','2020-03-18');
         }
         if($request->dateend != null){
        	$berita = $berita->where('date','<=',$request->dateend);
        	
         }
         else{
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         }

          if($request->datestart2 != null){
        	$label = $label->where('date','>=',$request->datestart);
         }
         else{
         	$label = $label->where('date','>=','2020-03-18');
         }
         if($request->dateend2 != null){
        	$label = $label->where('date','<=',$request->dateend);
         }
         else{
         	$label = $label->where('date','<=',date('Y-m-d'));
         }
	    if($request->area != null && $request->area !="Semua"){

	       if($request->area=="Jatim"){
	       		$provinsi= 'jawa timur';
	       		$kota=array("surabaya","sidoarjo","gresik", "malang","bangkalan","banyuwangi","blitar","bojonegoro","bondowoso","jember","jombang","kediri","lamongan","lumajang","madiun","magetan","mojokerto","nganjuk","ngawi","pacitan","pamekasan","pasuruan","ponorogo","probolinggo","sampang","sidoarjo","situbondo","sumenep","trenggalek","tuban","tulungagung","batu","kediri");

	       }
	       else if($request->area=="Jabar"){
	       		$provinsi= 'jawa barat';
	       		$kota=array("bandung barat","bandung","bekasi","bogor","ciamis","cianjur","cirebon","garut","indramayu","karawang","kuningan","majalengka","pangandaran","purwakarta","minahasa","subang","sukabumi","sumedang","tasikmalaya","banjar","bekasi","cimahi","depok");

	       }
	       else if($request->area=="Jateng"){
	       		$provinsi= 'jawa tengah';
	       		$kota=array("banjarnegara","banyumas","batang","blora","boyolali","brebes","cilacap","demak","grobogan","jepara","karanganyar","kebumen","kendai","klaten","kudus","magelang","pati","pekalongan","pemalang","purbalingga","purworejo","rembang","semarang","sragen","sukoharjo","tegal","temanggung","wonogiri","wonosobo","magelang","pekalongan","salatiga","surakarta");

	       }
	       else if($request->area=="DIY"){
	       		$provinsi= 'di_yogyakarta';
	       		$kota=array("bantul","gunung kidul","kulon progo","sleman","yogyakarta");
	       }
	       else if($request->area=="Jakarta"){
	       		$provinsi= 'dki jakarta';
	       		$kota=array("jakarta utara","jakarta barat","jakarta pusat","jakarta selatan","jakarta timur");

	       }
	       else if($request->area=="Banten"){
	       		$provinsi= 'banten';
	       		$kota=array("lebak","pandeglang","serang","cilegon","tangerang selatan","tangerang");
	       }
	       else if($request->area=="Aceh"){
	       		$provinsi= 'aceh';
	       		$kota=array("aceh barat daya","aceh barat","aceh besar","aceh jaya","aceh selatan","aceh singkil","aceh tamiang","aceh tengah","aceh tenggara","aceh timur","aceh utara","bener meriah","bireuren","gayo lues","nagan raya","pidie jaya","pidie","simeulue","banda aceh","langsa","lhokseumawe","sabang","subulussalam");

	       }
	       else if($request->area=="Jambi"){
	       		$provinsi= 'jambi';
	       		$kota=array("batanghari","bungo","kerinci","merangin","muaro jambi","sarolangun","tanjung jabung barat","tanjung jabung timur","jambi","sungaipenuh");

	       }
	       else if($request->area=="Sumut"){
	       		$provinsi= 'sumatera utara';
	       		$kota=array("asahan","batu bara","dairi","deli serdang","humbang hasundutan","karo","labuhanbatu selatan","labuhanbatu utara","labuhanbatu","langkat","mandailing natal","niat barat","nias selatan","nias utara","nias","padang lawas utara","padang lawas","pakpak bharat","samosir","serdang berdagai","simalungun","tapanuli selatan","tapanuli tengah","tapanuli utara","toba","binjai","gunungsitoli","medan","padangsidempuan","pematangsiantar","sibolga","tanjungbalai","tebing tinggi");

	       }
	       else if($request->area=="Sumbar"){
	       		$provinsi= 'sumatera barat';
	       		$kota=array("agam","dharmasraya","mentawai","lima puluh kota","padang pariaman","pasaman barat","pasaman","pasaman barat","pesisir selatan","sijunjung","solok selatan","solok","tanah datar","bukit tinggi","padang panjang","padang","pariaman","payakumbuh","sawahlunto","solok");

	       }
	       else if($request->area=="Sumsel"){
	       		$provinsi= 'sumatera selatan';
	       		$kota=array("banyuasin","empat lawang","lahat","muara enim","musi banyuasin","musi rawas utara","musi rawas","ogan ilir","ogan komering ilir","ogan komering ulu selatan","ogan komering ulu timur","ogan komering ulu","penukal abab lematang ilir","lubuklinggau","pagar alam","palembang","prabumulih");
	       }
	       else if($request->area=="Riau"){
	       		$provinsi= 'riau';
	       		$kota=array("bengkalis","indragiri hilir","indragiri hulu","kampar","kepulauan meranti","kuantan singingi","pelalawan","rokan hilir","rokan hulu","siak","dumai","pekanbaru");

	       }
	       else if($request->area=="Kep_riau"){
	       		$provinsi= 'Kepulauan riau';
	       		$kota=array("bintan","karimun","anambas","lingga","natuna","batam","tanjungpinang");
	       }
	       else if($request->area=="Babel"){
	       		$provinsi= 'bangka belitung';
	       		$kota=array("bangka barat","bangka tengah","bangka selatan","bangka","belitung","belitung timur","pangkalpinang");
	       }
	       else if($request->area=="Bengkulu"){
	       		$provinsi= 'bengkulu';
	       		$kota=array("bengkulu selatan","bengkulu tengah","bengkulu utara","kaur","kepahiang","lebong","mukomuko","rejang lebong","seluma","bengkulu");

	       }
	       else if($request->area=="Lampung"){
	       		$provinsi= 'lampung';
	       		$kota=array("lampung barat","lampung selatan","lampung tengah","lampung timur","lampung utara","mesuji","pesawaran","pesisir barat","pringsewu","tanggamus","tulang bawang barat","tulang bawang","way kanan","bandar lampung","metro lampung");
	       }
	       else if($request->area=="Bali"){
	       		$provinsi= 'bali';
	       		$kota=array("badung","bangli","buleleng","gianyar","jembrana","karangasem","klukung","tabanan","denpasar");
	       }
	       else if($request->area=="NTT"){
	       		$provinsi= 'nusa tenggara timur';
	       		$kota=array("bima","dompu","lombok barat","lombok timur","lombok utara","lombok tengah","lombok","sumbawa barat","sumbawa barat","bima","mataram");
	       }

	       else if($request->area=="NTB"){
	       		$provinsi= 'nusa tenggara barat';
	       		$kota=array("alor","belu","ende","flores timur","kupang","lembata","malaka","manggarai barat","manggarai timur","manggarai","nagekeo","ngada","rote ndao","sabu raijua","sikka","sumba barat daya","sumba barat","sumba timur","sumba tengah","timor tengah selatan","timor tengah utara","kupang");
	       }
	       else if($request->area=="Kalbar"){
	       		$provinsi= 'kalimantan barat';
	       		$kota=array("bengkayang","kapuas hulu","kayong utara","ketapang","kubu raya","landak","melawi","mempawah","sambas","sanggau","sekadau","sintang","potianak","singkawang");

	       }
	       else if($request->area=="Kalsel"){
	       		$provinsi= 'kalimantan selatan';
	       		$kota=array("balangan","banjar","barito kuala","hulu sungai selatan","hulu sungai tengah","hulu sungai utara","kotabaru","tabalong","tanah bumbu","tanah laut","tapin","banjarbaru","banjarmasin");
	       }
	       else if($request->area=="Kaltim"){
	       		$provinsi= 'kalimantan timur';
	       		$kota=array("berau","kutai barat","kutai kartanegara","kutai timur","mahakam ulu","paser","penajam paser utara","balikpapan","bontang","samarinda");

	       }
	       else if($request->area=="Kaltara"){
	       		$provinsi= 'kalimantan utara';
	       		$kota=array("bulungan","malinau","nunukan","tana tidung","tarakan");

	       }
	       else if($request->area=="Kalteng"){
	       		$provinsi= 'kalimantan tengah';
	       		$kota=array("barito selatan","barito timur","barito utara","gunung mas","kapuas","katingan","kotawaringin barat","kotawaringin timur","lamandau","murung raya","pulang pisau","sukamara","seruyan","palangkaraya");

	       }
	       else if($request->area=="Sulut"){
	       		$provinsi= 'sulawesi utara';
	       		$kota=array("bolaang mongondow selatan","bolaang mongondow utara","bolaang mongondow timur","bolaang mongondow","sangihe","siau tagulandang biaro","talaud","minahasa selatan","minahasa tenggara","minahasa utara","minahasa","bitung","kotamobagu","manado","tomohon");

	       }
	       else if($request->area=="Sulteng"){
	       		$provinsi= 'sulawesi tengah';
	       		$kota=array("banggai kepulauan","banggai laut","banggai","buol","donggala","morowali utara","morowali","parigi moutong","poso","sigi","tojo una-una","tolitoli","palu");
	       }
	       else if($request->area=="Sulbar"){
	       		$provinsi= 'sulawesi barat';
	       		$kota=array("majene","mamasa","mamuju tengah","mamuju","pasangkayu","polewali mandar");
	       }
	       else if($request->area=="Sulsel"){
	       		$provinsi= 'sulawesi selatan';
	       		$kota=array("bantaeng","barru","bone","bulukumba","enrekang","gowa","jeneponto","selayar","luwu timur","luwu utara","luwu","majonange","pangkep","pinrang","sidenreng rappang","sinjai","soppeng","takalar","tana toraja","toraja utara","wajo","makassar","palopo","parepare");
	       }
	       else if($request->area=="Sultra"){
	       		$provinsi= 'sulawesi tenggara';
	       		$kota=array("bombana","buton selatan","buton tengah","buton utara","buton","kolaka timur","kolaka utara","kolaka","konawe","konawe kepulauan","konawe selatan","konawe utara","muna barat","muna","wakatobi","bau-bau","kendari");
	       }
	       else if($request->area=="Gorontalo"){
	       		$provinsi= 'gorontalo';
	       		$kota=array("boalemo","bone bolango","gorontalo","gorontalo utara","pohutawo");
	       }
	       else if($request->area=="Maluku"){
	       		$provinsi= 'maluku';
	       		$kota=array("buru selatan","kepulauan aru","maluku barat daya","maluku tengah","maluku tenggara","kepulauan tanimbar","seram bagian barat","seram bagian timur","ambon","tual");
	       }
	       else if($request->area=="Malut"){
	       		$provinsi= 'maluku utara';
	       		$kota=array("halmahera barat","halmahera tengah","halmahera timur","halmahera selatan","halmahera utara","kepulauan sula","pulau morotai","pulau taliabu","ternate","tidore kepulauan");
	       }
	       else if($request->area=="Papua"){
	       		$provinsi= 'papua';
	       		$kota=array("asmat","biak numfor","boven digoel","deiyai","dogiyai","intan jaya","jayapura","jayawijaya","keerom","kepulauan yapen","lanny jaya","mamberamo raya","mamberamo tengah","mappi","merauke","mimika","nabire","nduga","paniai","pegunungan bintang","puncak jaya","puncak","sarmi","supiori","tolikara","waropen","yahukimo","yalimo");
	       }
	       else if($request->area=="Papbar"){
	       		$provinsi= 'papua barat';
	       		$kota=array("fakfak","kaimana","manokwari selatan","manokwari selatan","manokwari","maybrat","pegunungan arfak","raja ampat","sorong selatan","sorong","tambrauw","teluk bintuni","teluk wondama");
	       }
	       else if($request->area=="Indonesia"){
	       		$provinsi= '';
	       }

	       // $berita = $berita->where('area','=',$provinsi)->orderBy('date', 'ASC')->limit(100)->get();
	       $berita = $berita->where('area','=',$provinsi);
	       if($request->kota != "Semua" && $request->kota != null){
	       	 $berita = $berita->where('kota','=',$request->kota);
	       	 $city=$request->kota;
	       }
	       else if($request->kota == "Other"){
	       	 $berita = $berita->where('kota','=',"");
	       }
	     }
	     else{
	     	$berita = $berita->orderBy('date', 'ASC');
	     	$provinsi='';
	     }
	     // if($request->label != null && $request->label != "Semua"){
	     //    $berita = $berita->where('label','=',$request->label) ; 
	     // }
	     
	     $berita = $berita->orderBy('date', 'DESC')->paginate(10);
	     // $label = $label->select(DB::raw('SUM(`notification of information`) as Notification, SUM(donation) as Donation,SUM(criticisms) as Criticisms, SUM(hoax) as Hoax, SUM(other) as Other'))->get();

	     // array_push($array_to, $label->)

	   
	     $nof = $label->select(DB::raw('SUM(`notification of information`) as Notification'))->get();
	     $donation = $label->select(DB::raw('SUM(donation) as Donation'))->get();
	     $criticisms = $label->select(DB::raw('SUM(criticisms) as Criticisms'))->get();
	     $hoax = $label->select(DB::raw('SUM(hoax) as Hoax'))->get();
	     $other = $label->select(DB::raw('SUM(other) as Other'))->get();

	     $nof=substr($nof,2, -2);
	     $donation=substr($donation,2, -2);
	     $criticisms=substr($criticisms,2, -2);
	     $hoax=substr($hoax,2, -2);
	     $other=substr($other,2, -2);


	     $nof=explode(":",$nof);
	     $donation=explode(":",$donation);
	     $criticisms=explode(":",$criticisms);
	     $hoax=explode(":",$hoax);
	     $other=explode(":",$other);
	     //print($berita);
	     $nof=substr($nof[1],1,-1);
	   	 $donation=substr($donation[1],1, -1);
	     $criticisms=substr($criticisms[1],1, -1);
	     $hoax=substr($hoax[1],1, -1);
	     $other=substr($other[1],1, -1);
	    
	    
	  	 $label_array=[$nof,$donation,$criticisms,$hoax,$other];
        //print($data);
	  //    $label=substr($label,2, -2);
	  //    $label_array=array();
	  //    $label_array[]=$label;
	  //    $keys = array('y', 'y', 'y','y','y');
		 // $values = array('45', '54', '25','34','12');
	  //    $array = ['45', '54', '25','34','12'];
	     // $array = [{"x":"donation","y":"45"},{"x":"wiki","y":"24"},{"x":"do","y":"65"},{"x":"ok","y":"43"},{"x":"wkwk","y":"30"}];
        
        return view('berita.listberita',['berita'=>$berita,'label'=>$label_array,'kota'=>$kota,'provinsi'=>ucwords($provinsi),$city]);
    }
 //    public function testPythonScript()
	// {
 //    	$process = shell_exec("python3 justtest.py 'test'");
 //    	return $process;
	// }

	public function indexkota($provinsi,$kota,Request $request)
    {
    	$berita = News::query();
        $label= DataLabel::query();
        
    	if($request->datestart != null){
        	$berita = $berita->where('date','>=',$request->datestart);
        	
         }
         else{
         	$berita = $berita->where('date','>=','2020-03-18');
         }
         if($request->dateend != null){
        	$berita = $berita->where('date','<=',$request->dateend);
        	
         }
         else{
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         }
         if($request->kota != "Semua" && $request->kota != null){
	       	 $berita = $berita->where('kota','=',$request->kota);
	       	 $city=$request->kota;
	       }
	     else if($request->kota == "Other"){
	       	$berita = $berita->where('kota','=',"");
	     }

	    $berita = $berita->orderBy('date', 'DESC')->paginate(10);
    	return view('berita.listberitakota',['berita'=>$berita,'kota'=>ucwords($kota),'provinsi'=>ucwords($provinsi)]);

    }
}
