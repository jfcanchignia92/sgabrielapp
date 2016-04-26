<?php namespace App\Http\Controllers;

use App\Ministerio;
use DB;

class StartController extends Controller {
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $today = date('Ymd');
        $evangeliot =null;
        $evangelio =null;
        $salmot =null;
        $salmo =null;
        $url = "http://feed.evangelizo.org/v2/reader.php?date=$today&type=reading_st&lang=SP&content=GSP";
        $h = fopen($url,"r");
        while (!feof($h)) {
            $evangeliot .= fgets($h);
        }
        $url = "http://feed.evangelizo.org/v2/reader.php?date=$today&type=reading&lang=SP&content=GSP";
        $h = fopen($url,"r");
        while (!feof($h)) {
            $evangelio .= fgets($h);
        }
        $url = "http://feed.evangelizo.org/v2/reader.php?date=$today&type=reading_st&lang=SP&content=PS";
        $h = fopen($url,"r");
        while (!feof($h)) {
            $salmot .= fgets($h);
        }
        $url = "http://feed.evangelizo.org/v2/reader.php?date=$today&type=reading&lang=SP&content=PS";
        $h = fopen($url,"r");
        while (!feof($h)) {
            $salmo .= fgets($h);
        }
        $str = array('TE'=>$evangeliot,'E'=>$evangelio,'TS'=>$salmot,'S'=>$salmo);
        return view('website\home')->with('data',$str);
    }
    public function ministerios()
    {
        $ministerios = Ministerio::all();
        //var_dump($ministerios);
        return view('website\ministerios')->with('ministerios',$ministerios);
    }
    public function contactos()
    {
        return view('website\contactos');
    }
    public function online()
    {
        return view('website\online');
    }
    public function noticias()
    {
        return view('website\noticia');
    }
    public function acerca()
    {
        return view('website\acerca');
    }
    public function ministerioInfo($nombre)
    {
        $mini = Ministerio::where('MNT_NOMBRE','=',str_replace("_"," ",$nombre))->firstOrFail();
        //var_dump($mini);
        return view('website\ministerioInfo')->with('ministerio',$mini);
    }
    public function servicioOnline($nombre)
    {
        return view('website\servicioOnline')->with('servicio',$nombre);
    }
}