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
        return view('website\home');
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