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
        $sort="";
        $kota= array();
        if($request->datestart != null){
        	$berita = $berita->where('date','>=',$request->datestart);
        	$temp1 = $request->datestart;
         }
         else{
         	$berita = $berita->where('date','>=','2020-03-18');
         	$temp1 = '2020-03-18';
         }
         if($request->dateend != null){
        	$berita = $berita->where('date','<=',$request->dateend);
        	$temp2 = $request->dateend;
         }
         else{
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         	$temp2 = date('Y-m-d');
         }

	    if(($request->area != null && $request->area !="Semua") || ($request->provinsi!=null)){

	       if($request->area=="Jatim" || $request->provinsi=="jawa timur"){
	       		$provinsi= 'jawa timur';
	       		$kota=array("surabaya","sidoarjo","gresik", "malang","bangkalan","banyuwangi","blitar","bojonegoro","bondowoso","jember","jombang","kediri","lamongan","lumajang","madiun","magetan","mojokerto","nganjuk","ngawi","pacitan","pamekasan","pasuruan","ponorogo","probolinggo","sampang","sidoarjo","situbondo","sumenep","trenggalek","tuban","tulungagung","batu","kediri");

	       }
	       else if($request->area=="Jabar" || $request->provinsi=="jawa barat"){

	       		$provinsi= 'jawa barat';
	       		$kota=array("bandung barat","bandung","bekasi","bogor","ciamis","cianjur","cirebon","garut","indramayu","karawang","kuningan","majalengka","pangandaran","purwakarta","minahasa","subang","sukabumi","sumedang","tasikmalaya","banjar","cimahi","depok");

	       }
	       else if($request->area=="Jateng" || $request->provinsi=="jawa tengah"){
	       		$provinsi= 'jawa tengah';
	       		$kota=array("banjarnegara","banyumas","batang","blora","boyolali","brebes","cilacap","demak","grobogan","jepara","karanganyar","kebumen","kendai","klaten","kudus","magelang","pati","pekalongan","pemalang","purbalingga","purworejo","rembang","semarang","sragen","sukoharjo","tegal","temanggung","wonogiri","wonosobo","magelang","pekalongan","salatiga","surakarta");

	       }
	       else if($request->area=="DIY" || $request->provinsi=="di_yogyakarta"){
	       		$provinsi= 'di_yogyakarta';
	       		$kota=array("bantul","gunung kidul","kulon progo","sleman","yogyakarta");
	       }
	       else if($request->area=="Jakarta" || $request->provinsi=="dki jakarta"){
	       		$provinsi= 'dki jakarta';
	       		$kota=array("jakarta utara","jakarta barat","jakarta pusat","jakarta selatan","jakarta timur");

	       }
	       else if($request->area=="Banten" || $request->provinsi=="banten"){
	       		$provinsi= 'banten';
	       		$kota=array("lebak","pandeglang","serang","cilegon","tangerang selatan","tangerang");
	       }
	       else if($request->area=="Aceh" || $request->provinsi=="aceh"){
	       		$provinsi= 'aceh';
	       		$kota=array("aceh barat daya","aceh barat","aceh besar","aceh jaya","aceh selatan","aceh singkil","aceh tamiang","aceh tengah","aceh tenggara","aceh timur","aceh utara","bener meriah","bireuren","gayo lues","nagan raya","pidie jaya","pidie","simeulue","banda aceh","langsa","lhokseumawe","sabang","subulussalam");

	       }
	       else if($request->area=="Jambi" || $request->provinsi=="jambi"){
	       		$provinsi= 'jambi';
	       		$kota=array("batanghari","bungo","kerinci","merangin","muaro jambi","sarolangun","tanjung jabung barat","tanjung jabung timur","jambi","sungaipenuh");

	       }
	       else if($request->area=="Sumut" || $request->provinsi=="sumatera utara"){
	       		$provinsi= 'sumatera utara';
	       		$kota=array("asahan","batu bara","dairi","deli serdang","humbang hasundutan","karo","labuhanbatu selatan","labuhanbatu utara","labuhanbatu","langkat","mandailing natal","niat barat","nias selatan","nias utara","nias","padang lawas utara","padang lawas","pakpak bharat","samosir","serdang berdagai","simalungun","tapanuli selatan","tapanuli tengah","tapanuli utara","toba","binjai","gunungsitoli","medan","padangsidempuan","pematangsiantar","sibolga","tanjungbalai","tebing tinggi");

	       }
	       else if($request->area=="Sumbar" || $request->provinsi=="sumatera barat"){
	       		$provinsi= 'sumatera barat';
	       		$kota=array("agam","dharmasraya","mentawai","lima puluh kota","padang pariaman","pasaman barat","pasaman","pasaman barat","pesisir selatan","sijunjung","solok selatan","solok","tanah datar","bukit tinggi","padang panjang","padang","pariaman","payakumbuh","sawahlunto","solok");

	       }
	       else if($request->area=="Sumsel" || $request->provinsi=="sumatera selatan"){
	       		$provinsi= 'sumatera selatan';
	       		$kota=array("banyuasin","empat lawang","lahat","muara enim","musi banyuasin","musi rawas utara","musi rawas","ogan ilir","ogan komering ilir","ogan komering ulu selatan","ogan komering ulu timur","ogan komering ulu","penukal abab lematang ilir","lubuklinggau","pagar alam","palembang","prabumulih");
	       }
	       else if($request->area=="Riau" || $request->provinsi=="riau"){
	       		$provinsi= 'riau';
	       		$kota=array("bengkalis","indragiri hilir","indragiri hulu","kampar","kepulauan meranti","kuantan singingi","pelalawan","rokan hilir","rokan hulu","siak","dumai","pekanbaru");

	       }
	       else if($request->area=="Kep_riau" || $request->provinsi=="kepulauan riau"){
	       		$provinsi= 'Kepulauan riau';
	       		$kota=array("bintan","karimun","anambas","lingga","natuna","batam","tanjungpinang");
	       }
	       else if($request->area=="Babel" || $request->provinsi=="bangka belitung"){
	       		$provinsi= 'bangka belitung';
	       		$kota=array("bangka barat","bangka tengah","bangka selatan","bangka","belitung","belitung timur","pangkalpinang");
	       }
	       else if($request->area=="Bengkulu" || $request->provinsi=="bengkulu"){
	       		$provinsi= 'bengkulu';
	       		$kota=array("bengkulu selatan","bengkulu tengah","bengkulu utara","kaur","kepahiang","lebong","mukomuko","rejang lebong","seluma","bengkulu");

	       }
	       else if($request->area=="Lampung" || $request->provinsi=="jakarta"){
	       		$provinsi= 'lampung';
	       		$kota=array("lampung barat","lampung selatan","lampung tengah","lampung timur","lampung utara","mesuji","pesawaran","pesisir barat","pringsewu","tanggamus","tulang bawang barat","tulang bawang","way kanan","bandar lampung","metro lampung");
	       }
	       else if($request->area=="Bali" || $request->provinsi=="bali"){
	       		$provinsi= 'bali';
	       		$kota=array("badung","bangli","buleleng","gianyar","jembrana","karangasem","klukung","tabanan","denpasar");
	       }
	       else if($request->area=="NTT" || $request->provinsi=="nusa tenggara timur"){
	       		$provinsi= 'nusa tenggara timur';
	       		$kota=array("bima","dompu","lombok barat","lombok timur","lombok utara","lombok tengah","lombok","sumbawa barat","sumbawa barat","bima","mataram");
	       }

	       else if($request->area=="NTB" || $request->provinsi=="nusa tenggara barat"){
	       		$provinsi= 'nusa tenggara barat';
	       		$kota=array("alor","belu","ende","flores timur","kupang","lembata","malaka","manggarai barat","manggarai timur","manggarai","nagekeo","ngada","rote ndao","sabu raijua","sikka","sumba barat daya","sumba barat","sumba timur","sumba tengah","timor tengah selatan","timor tengah utara","kupang");
	       }
	       else if($request->area=="Kalbar" || $request->provinsi=="kalimantan barat"){
	       		$provinsi= 'kalimantan barat';
	       		$kota=array("bengkayang","kapuas hulu","kayong utara","ketapang","kubu raya","landak","melawi","mempawah","sambas","sanggau","sekadau","sintang","potianak","singkawang");

	       }
	       else if($request->area=="Kalsel" || $request->provinsi=="kalimantan selatan"){
	       		$provinsi= 'kalimantan selatan';
	       		$kota=array("balangan","banjar","barito kuala","hulu sungai selatan","hulu sungai tengah","hulu sungai utara","kotabaru","tabalong","tanah bumbu","tanah laut","tapin","banjarbaru","banjarmasin");
	       }
	       else if($request->area=="Kaltim" || $request->provinsi=="kalimantan timur"){
	       		$provinsi= 'kalimantan timur';
	       		$kota=array("berau","kutai barat","kutai kartanegara","kutai timur","mahakam ulu","paser","penajam paser utara","balikpapan","bontang","samarinda");

	       }
	       else if($request->area=="Kaltara" || $request->provinsi=="kalimantan utara"){
	       		$provinsi= 'kalimantan utara';
	       		$kota=array("bulungan","malinau","nunukan","tana tidung","tarakan");

	       }
	       else if($request->area=="Kalteng" || $request->provinsi=="kalimantan tengah"){
	       		$provinsi= 'kalimantan tengah';
	       		$kota=array("barito selatan","barito timur","barito utara","gunung mas","kapuas","katingan","kotawaringin barat","kotawaringin timur","lamandau","murung raya","pulang pisau","sukamara","seruyan","palangkaraya");

	       }
	       else if($request->area=="Sulut" || $request->provinsi=="sulawesi utara "){
	       		$provinsi= 'sulawesi utara';
	       		$kota=array("bolaang mongondow selatan","bolaang mongondow utara","bolaang mongondow timur","bolaang mongondow","sangihe","siau tagulandang biaro","talaud","minahasa selatan","minahasa tenggara","minahasa utara","minahasa","bitung","kotamobagu","manado","tomohon");

	       }
	       else if($request->area=="Sulteng" || $request->provinsi=="sulawesi tengah"){
	       		$provinsi= 'sulawesi tengah';
	       		$kota=array("banggai kepulauan","banggai laut","banggai","buol","donggala","morowali utara","morowali","parigi moutong","poso","sigi","tojo una-una","tolitoli","palu");
	       }
	       else if($request->area=="Sulbar" || $request->provinsi=="sulawesi barat"){
	       		$provinsi= 'sulawesi barat';
	       		$kota=array("majene","mamasa","mamuju tengah","mamuju","pasangkayu","polewali mandar");
	       }
	       else if($request->area=="Sulsel" || $request->provinsi=="sulawesi selatan"){
	       		$provinsi= 'sulawesi selatan';
	       		$kota=array("bantaeng","barru","bone","bulukumba","enrekang","gowa","jeneponto","selayar","luwu timur","luwu utara","luwu","majonange","pangkep","pinrang","sidenreng rappang","sinjai","soppeng","takalar","tana toraja","toraja utara","wajo","makassar","palopo","parepare");
	       }
	       else if($request->area=="Sultra" || $request->provinsi=="sulawesi tenggara"){
	       		$provinsi= 'sulawesi tenggara';
	       		$kota=array("bombana","buton selatan","buton tengah","buton utara","buton","kolaka timur","kolaka utara","kolaka","konawe","konawe kepulauan","konawe selatan","konawe utara","muna barat","muna","wakatobi","bau-bau","kendari");
	       }
	       else if($request->area=="Gorontalo" || $request->provinsi=="gorontalo"){
	       		$provinsi= 'gorontalo';
	       		$kota=array("boalemo","bone bolango","gorontalo","gorontalo utara","pohutawo");
	       }
	       else if($request->area=="Maluku" || $request->provinsi=="maluku"){
	       		$provinsi= 'maluku';
	       		$kota=array("buru selatan","kepulauan aru","maluku barat daya","maluku tengah","maluku tenggara","kepulauan tanimbar","seram bagian barat","seram bagian timur","ambon","tual");
	       }
	       else if($request->area=="Malut" || $request->provinsi=="maluku utara"){
	       		$provinsi= 'maluku utara';
	       		$kota=array("halmahera barat","halmahera tengah","halmahera timur","halmahera selatan","halmahera utara","kepulauan sula","pulau morotai","pulau taliabu","ternate","tidore kepulauan");
	       }
	       else if($request->area=="Papua" || $request->provinsi=="papua"){
	       		$provinsi= 'papua';
	       		$kota=array("asmat","biak numfor","boven digoel","deiyai","dogiyai","intan jaya","jayapura","jayawijaya","keerom","kepulauan yapen","lanny jaya","mamberamo raya","mamberamo tengah","mappi","merauke","mimika","nabire","nduga","paniai","pegunungan bintang","puncak jaya","puncak","sarmi","supiori","tolikara","waropen","yahukimo","yalimo");
	       }
	       else if($request->area=="Papbar" || $request->provinsi=="papua barat"){
	       		$provinsi= 'papua barat';
	       		$kota=array("fakfak","kaimana","manokwari selatan","manokwari selatan","manokwari","maybrat","pegunungan arfak","raja ampat","sorong selatan","sorong","tambrauw","teluk bintuni","teluk wondama");
	       }
	       else if($request->area=="Indonesia" || $request->provinsi=="indonesia"){
	       		$provinsi= '';
	       }
	       $berita = $berita->where('area','=',$provinsi); 

	     }
	     else{
	     	$berita = $berita;
	     	$provinsi='Indonesia';
	     }
	     if($request->label != null && $request->label != "Semua"){
	     	$berita = $berita->where('label','=',$request->label) ; 
	     }

	     
	     
	  	 sort($kota);
	  	 $jumlah_berita_kota=array();
	  	 if(($request->area != null && $request->area !="Semua") || ($request->provinsi!=null)){
	     	foreach($kota as $k){
	     		$jumlah_berita_kota[]= News::query()->where('date','>=',$temp1)->where('date','<=',$temp2)->where('kota','=',$k)->count();	
	     	}
	     }
	     



        if($request->sorting == "Terlama"){
        	$berita = $berita->orderBy('date', 'ASC')->paginate(10);
        	$sort="Terlama";
         }

         else if($request->sorting == "Terbaru"||$request->sorting == null){
         	$berita = $berita->orderBy('date', 'DESC')->paginate(10);
         	$sort="Terbaru";
         }
        return view('berita.listberita',['berita'=>$berita,'jumlah_berita_kota'=>$jumlah_berita_kota,'kota'=>$kota,'provinsi'=>ucwords($provinsi),$city,'sort'=>$sort]);
    }


	public function indexkota($provinsi,$kota,Request $request)
    {
    	$berita = News::query();
        $label= DataLabel::query();
        $sort="";
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

	    if($request->sorting == "Terlama"){
        	$berita = $berita->orderBy('date', 'ASC')->paginate(10);
        	$sort="Terlama";
         }

         else if($request->sorting == "Terbaru"||$request->sorting == null){
         	$berita = $berita->orderBy('date', 'DESC')->paginate(10);
         	$sort="Terbaru";
         }
        
    	return view('berita.listberitakota',['berita'=>$berita,'kota'=>ucwords($kota),'provinsi'=>ucwords($provinsi),'sort'=>$sort]);

    }
    public function indexprovinsi($provinsi,Request $request)
    {
    	$berita = News::query();
        $label= DataLabel::query();
        $city="";
        $provinsi="";
        $sort="";
        $kota= array();
        if($request->datestart != null){
        	$berita = $berita->where('date','>=',$request->datestart);
        	$temp1 = $request->datestart;
         }
         else{
         	$berita = $berita->where('date','>=','2020-03-18');
         	$temp1 = '2020-03-18';
         }
         if($request->dateend != null){
        	$berita = $berita->where('date','<=',$request->dateend);
        	$temp2 = $request->dateend;
         }
         else{
         	$berita = $berita->where('date','<=',date('Y-m-d'));
         	$temp2 = date('Y-m-d');
         }
        $request->provinsi=strtolower($request->provinsi);
	    if(($request->area != null && $request->area !="Semua") || ($request->provinsi!=null)){
	    	return "tes";
	       if($request->area=="Jatim" || $request->provinsi=="jawa timur"){
	       		$provinsi= 'jawa timur';
	       		$kota=array("surabaya","sidoarjo","gresik", "malang","bangkalan","banyuwangi","blitar","bojonegoro","bondowoso","jember","jombang","kediri","lamongan","lumajang","madiun","magetan","mojokerto","nganjuk","ngawi","pacitan","pamekasan","pasuruan","ponorogo","probolinggo","sampang","sidoarjo","situbondo","sumenep","trenggalek","tuban","tulungagung","batu","kediri");

	       }
	       else if($request->area=="Jabar" || $request->provinsi=="jawa barat"){

	       		$provinsi= 'jawa barat';
	       		$kota=array("bandung barat","bandung","bekasi","bogor","ciamis","cianjur","cirebon","garut","indramayu","karawang","kuningan","majalengka","pangandaran","purwakarta","minahasa","subang","sukabumi","sumedang","tasikmalaya","banjar","cimahi","depok");

	       }
	       else if($request->area=="Jateng" || $request->provinsi=="jawa tengah"){
	       		$provinsi= 'jawa tengah';
	       		$kota=array("banjarnegara","banyumas","batang","blora","boyolali","brebes","cilacap","demak","grobogan","jepara","karanganyar","kebumen","kendai","klaten","kudus","magelang","pati","pekalongan","pemalang","purbalingga","purworejo","rembang","semarang","sragen","sukoharjo","tegal","temanggung","wonogiri","wonosobo","magelang","pekalongan","salatiga","surakarta");

	       }
	       else if($request->area=="DIY" || $request->provinsi=="di_yogyakarta"){
	       		$provinsi= 'di_yogyakarta';
	       		$kota=array("bantul","gunung kidul","kulon progo","sleman","yogyakarta");
	       }
	       else if($request->area=="Jakarta" || $request->provinsi=="dki jakarta"){
	       		$provinsi= 'dki jakarta';
	       		$kota=array("jakarta utara","jakarta barat","jakarta pusat","jakarta selatan","jakarta timur");

	       }
	       else if($request->area=="Banten" || $request->provinsi=="banten"){
	       		$provinsi= 'banten';
	       		$kota=array("lebak","pandeglang","serang","cilegon","tangerang selatan","tangerang");
	       }
	       else if($request->area=="Aceh" || $request->provinsi=="aceh"){
	       		$provinsi= 'aceh';
	       		$kota=array("aceh barat daya","aceh barat","aceh besar","aceh jaya","aceh selatan","aceh singkil","aceh tamiang","aceh tengah","aceh tenggara","aceh timur","aceh utara","bener meriah","bireuren","gayo lues","nagan raya","pidie jaya","pidie","simeulue","banda aceh","langsa","lhokseumawe","sabang","subulussalam");

	       }
	       else if($request->area=="Jambi" || $request->provinsi=="jambi"){
	       		$provinsi= 'jambi';
	       		$kota=array("batanghari","bungo","kerinci","merangin","muaro jambi","sarolangun","tanjung jabung barat","tanjung jabung timur","jambi","sungaipenuh");

	       }
	       else if($request->area=="Sumut" || $request->provinsi=="sumatera utara"){
	       		$provinsi= 'sumatera utara';
	       		$kota=array("asahan","batu bara","dairi","deli serdang","humbang hasundutan","karo","labuhanbatu selatan","labuhanbatu utara","labuhanbatu","langkat","mandailing natal","niat barat","nias selatan","nias utara","nias","padang lawas utara","padang lawas","pakpak bharat","samosir","serdang berdagai","simalungun","tapanuli selatan","tapanuli tengah","tapanuli utara","toba","binjai","gunungsitoli","medan","padangsidempuan","pematangsiantar","sibolga","tanjungbalai","tebing tinggi");

	       }
	       else if($request->area=="Sumbar" || $request->provinsi=="sumatera barat"){
	       		$provinsi= 'sumatera barat';
	       		$kota=array("agam","dharmasraya","mentawai","lima puluh kota","padang pariaman","pasaman barat","pasaman","pasaman barat","pesisir selatan","sijunjung","solok selatan","solok","tanah datar","bukit tinggi","padang panjang","padang","pariaman","payakumbuh","sawahlunto","solok");

	       }
	       else if($request->area=="Sumsel" || $request->provinsi=="sumatera selatan"){
	       		$provinsi= 'sumatera selatan';
	       		$kota=array("banyuasin","empat lawang","lahat","muara enim","musi banyuasin","musi rawas utara","musi rawas","ogan ilir","ogan komering ilir","ogan komering ulu selatan","ogan komering ulu timur","ogan komering ulu","penukal abab lematang ilir","lubuklinggau","pagar alam","palembang","prabumulih");
	       }
	       else if($request->area=="Riau" || $request->provinsi=="riau"){
	       		$provinsi= 'riau';
	       		$kota=array("bengkalis","indragiri hilir","indragiri hulu","kampar","kepulauan meranti","kuantan singingi","pelalawan","rokan hilir","rokan hulu","siak","dumai","pekanbaru");

	       }
	       else if($request->area=="Kep_riau" || $request->provinsi=="kepulauan riau"){
	       		$provinsi= 'Kepulauan riau';
	       		$kota=array("bintan","karimun","anambas","lingga","natuna","batam","tanjungpinang");
	       }
	       else if($request->area=="Babel" || $request->provinsi=="bangka belitung"){
	       		$provinsi= 'bangka belitung';
	       		$kota=array("bangka barat","bangka tengah","bangka selatan","bangka","belitung","belitung timur","pangkalpinang");
	       }
	       else if($request->area=="Bengkulu" || $request->provinsi=="bengkulu"){
	       		$provinsi= 'bengkulu';
	       		$kota=array("bengkulu selatan","bengkulu tengah","bengkulu utara","kaur","kepahiang","lebong","mukomuko","rejang lebong","seluma","bengkulu");

	       }
	       else if($request->area=="Lampung" || $request->provinsi=="jakarta"){
	       		$provinsi= 'lampung';
	       		$kota=array("lampung barat","lampung selatan","lampung tengah","lampung timur","lampung utara","mesuji","pesawaran","pesisir barat","pringsewu","tanggamus","tulang bawang barat","tulang bawang","way kanan","bandar lampung","metro lampung");
	       }
	       else if($request->area=="Bali" || $request->provinsi=="bali"){
	       		$provinsi= 'bali';
	       		$kota=array("badung","bangli","buleleng","gianyar","jembrana","karangasem","klukung","tabanan","denpasar");
	       }
	       else if($request->area=="NTT" || $request->provinsi=="nusa tenggara timur"){
	       		$provinsi= 'nusa tenggara timur';
	       		$kota=array("bima","dompu","lombok barat","lombok timur","lombok utara","lombok tengah","lombok","sumbawa barat","sumbawa barat","bima","mataram");
	       }

	       else if($request->area=="NTB" || $request->provinsi=="nusa tenggara barat"){
	       		$provinsi= 'nusa tenggara barat';
	       		$kota=array("alor","belu","ende","flores timur","kupang","lembata","malaka","manggarai barat","manggarai timur","manggarai","nagekeo","ngada","rote ndao","sabu raijua","sikka","sumba barat daya","sumba barat","sumba timur","sumba tengah","timor tengah selatan","timor tengah utara","kupang");
	       }
	       else if($request->area=="Kalbar" || $request->provinsi=="kalimantan barat"){
	       		$provinsi= 'kalimantan barat';
	       		$kota=array("bengkayang","kapuas hulu","kayong utara","ketapang","kubu raya","landak","melawi","mempawah","sambas","sanggau","sekadau","sintang","potianak","singkawang");

	       }
	       else if($request->area=="Kalsel" || $request->provinsi=="kalimantan selatan"){
	       		$provinsi= 'kalimantan selatan';
	       		$kota=array("balangan","banjar","barito kuala","hulu sungai selatan","hulu sungai tengah","hulu sungai utara","kotabaru","tabalong","tanah bumbu","tanah laut","tapin","banjarbaru","banjarmasin");
	       }
	       else if($request->area=="Kaltim" || $request->provinsi=="kalimantan timur"){
	       		$provinsi= 'kalimantan timur';
	       		$kota=array("berau","kutai barat","kutai kartanegara","kutai timur","mahakam ulu","paser","penajam paser utara","balikpapan","bontang","samarinda");

	       }
	       else if($request->area=="Kaltara" || $request->provinsi=="kalimantan utara"){
	       		$provinsi= 'kalimantan utara';
	       		$kota=array("bulungan","malinau","nunukan","tana tidung","tarakan");

	       }
	       else if($request->area=="Kalteng" || $request->provinsi=="kalimantan tengah"){
	       		$provinsi= 'kalimantan tengah';
	       		$kota=array("barito selatan","barito timur","barito utara","gunung mas","kapuas","katingan","kotawaringin barat","kotawaringin timur","lamandau","murung raya","pulang pisau","sukamara","seruyan","palangkaraya");

	       }
	       else if($request->area=="Sulut" || $request->provinsi=="sulawesi utara "){
	       		$provinsi= 'sulawesi utara';
	       		$kota=array("bolaang mongondow selatan","bolaang mongondow utara","bolaang mongondow timur","bolaang mongondow","sangihe","siau tagulandang biaro","talaud","minahasa selatan","minahasa tenggara","minahasa utara","minahasa","bitung","kotamobagu","manado","tomohon");

	       }
	       else if($request->area=="Sulteng" || $request->provinsi=="sulawesi tengah"){
	       		$provinsi= 'sulawesi tengah';
	       		$kota=array("banggai kepulauan","banggai laut","banggai","buol","donggala","morowali utara","morowali","parigi moutong","poso","sigi","tojo una-una","tolitoli","palu");
	       }
	       else if($request->area=="Sulbar" || $request->provinsi=="sulawesi barat"){
	       		$provinsi= 'sulawesi barat';
	       		$kota=array("majene","mamasa","mamuju tengah","mamuju","pasangkayu","polewali mandar");
	       }
	       else if($request->area=="Sulsel" || $request->provinsi=="sulawesi selatan"){
	       		$provinsi= 'sulawesi selatan';
	       		$kota=array("bantaeng","barru","bone","bulukumba","enrekang","gowa","jeneponto","selayar","luwu timur","luwu utara","luwu","majonange","pangkep","pinrang","sidenreng rappang","sinjai","soppeng","takalar","tana toraja","toraja utara","wajo","makassar","palopo","parepare");
	       }
	       else if($request->area=="Sultra" || $request->provinsi=="sulawesi tenggara"){
	       		$provinsi= 'sulawesi tenggara';
	       		$kota=array("bombana","buton selatan","buton tengah","buton utara","buton","kolaka timur","kolaka utara","kolaka","konawe","konawe kepulauan","konawe selatan","konawe utara","muna barat","muna","wakatobi","bau-bau","kendari");
	       }
	       else if($request->area=="Gorontalo" || $request->provinsi=="gorontalo"){
	       		$provinsi= 'gorontalo';
	       		$kota=array("boalemo","bone bolango","gorontalo","gorontalo utara","pohutawo");
	       }
	       else if($request->area=="Maluku" || $request->provinsi=="maluku"){
	       		$provinsi= 'maluku';
	       		$kota=array("buru selatan","kepulauan aru","maluku barat daya","maluku tengah","maluku tenggara","kepulauan tanimbar","seram bagian barat","seram bagian timur","ambon","tual");
	       }
	       else if($request->area=="Malut" || $request->provinsi=="maluku utara"){
	       		$provinsi= 'maluku utara';
	       		$kota=array("halmahera barat","halmahera tengah","halmahera timur","halmahera selatan","halmahera utara","kepulauan sula","pulau morotai","pulau taliabu","ternate","tidore kepulauan");
	       }
	       else if($request->area=="Papua" || $request->provinsi=="papua"){
	       		$provinsi= 'papua';
	       		$kota=array("asmat","biak numfor","boven digoel","deiyai","dogiyai","intan jaya","jayapura","jayawijaya","keerom","kepulauan yapen","lanny jaya","mamberamo raya","mamberamo tengah","mappi","merauke","mimika","nabire","nduga","paniai","pegunungan bintang","puncak jaya","puncak","sarmi","supiori","tolikara","waropen","yahukimo","yalimo");
	       }
	       else if($request->area=="Papbar" || $request->provinsi=="papua barat"){
	       		$provinsi= 'papua barat';
	       		$kota=array("fakfak","kaimana","manokwari selatan","manokwari selatan","manokwari","maybrat","pegunungan arfak","raja ampat","sorong selatan","sorong","tambrauw","teluk bintuni","teluk wondama");
	       }
	       else if($request->area=="Indonesia" || $request->provinsi=="indonesia"){
	       		$provinsi= '';
	       }
	       $berita = $berita->where('area','=',$provinsi); 

	     }
	     else{
	     	$berita = $berita;
	     	$provinsi='Indonesia';
	     }
	     if($request->label != null && $request->label != "Semua"){
	     	$berita = $berita->where('label','=',$request->label) ; 
	     }

	     
	     
	  	 sort($kota);
	  	 $jumlah_berita_kota=array();
	  	 if(($request->area != null && $request->area !="Semua") || ($request->provinsi!=null)){
	     	foreach($kota as $k){
	     		$jumlah_berita_kota[]= News::query()->where('date','>=',$temp1)->where('date','<=',$temp2)->where('kota','=',$k)->count();	
	     	}
	     }
	     
        if($request->sorting == "Terlama"){
        	$berita = $berita->orderBy('date', 'ASC')->paginate(10);
        	$sort="Terlama";
         }

         else if($request->sorting == "Terbaru"||$request->sorting == null){
         	$berita = $berita->orderBy('date', 'DESC')->paginate(10);
         	$sort="Terbaru";
         }
        return view('berita.listberita',['berita'=>$berita,'jumlah_berita_kota'=>$jumlah_berita_kota,'kota'=>$kota,'provinsi'=>ucwords($provinsi),$city,'sort'=>$sort]);
    }

    public function cariberita(Request $request)
    {
    	// menangkap data pencarian
    	$berita = News::query();
		$cari = $request->cari;
 		
 		if($request->provinsi!=null){
			$berita = $berita->where('area','=',$request->$provinsi)->where('title','like',"%".$cari."%")->paginate(10);
		}
 		else{
 			$berita = $berita->where('title','like',"%".$cari."%")->paginate(10);
 		}
		return view('berita.listberita',['berita' => $berita,'provinsi']);
    }
}
