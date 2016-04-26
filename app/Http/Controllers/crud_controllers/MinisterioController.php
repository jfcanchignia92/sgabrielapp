<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Ministerio;
use DB;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;

class MinisterioController extends Controller{
    public function index1() {
        $ministerios = Ministerio::all();
        return view('website\ministerios')->with('ministerios',$ministerios);
    }
    public function index() {
        $ministerios = Ministerio::all();
        return view('adminpage\AdminMinisterios')->with('ministerios',$ministerios);
    }
    public function show($id) {
        $ministerio = Ministerio::find($id);
        return view('adminpage\AdminMinisterios')->with('ministerio',$ministerio);
    }
    public function store() {
        $ministerio = new Ministerio();
        $ministerio->MNT_NOMBRE = Input::get('nombre');
        $ministerio->MNT_DESCRIPCION = Input::get('descripcion');
        $file= Input::file('imagen');
        $nombre_img = $file->getClientOriginalName();
        $ministerio->MNT_IMG = $nombre_img;
        $ministerio->MNT_INFORMACION = Input::get('informacion');
        $ministerio->save();
        return Redirect::to('adminpage\Ministerios')->with('notice', 'Elemento ingresado exitosamente!');
    }
    public function edit($id) {
        $ministerio = new Ministerio();
        return view::make('ministerios.save')->with('ministerio',$ministerio);
    }
    public function update($id)
    {
        $ministerio = Ministerio::find($id);
        $ministerio->MNT_NOMBRE = Input::get('nombre');
        $file = Input::file('imagen');
        if ($file != null) {
            $nombre_img = $file->getClientOriginalName();
            $ministerio->MNT_IMG = $nombre_img;
        }
        $ministerio->MNT_INFORMACION = Input::get('informacion');
        DB::table('ministerios')->where('MNT_ID', '=', $id)->update(array(
            'MNT_NOMBRE' => $ministerio->MNT_NOMBRE,
            'MNT_DESCRIPCION' => $ministerio->MNT_DESCRIPCION,
            'MNT_IMG' => $ministerio->MNT_IMG,
            'MNT_INFORMACION' => $ministerio->MNT_INFORMACION
        ));
        return Redirect::to('adminpage\Ministerios')->with('notice', 'Elemento modificado exitosamente!');
    }
    public function destroy($id) {
        DB::table('ministerios')->where('MNT_ID', '=', $id)->delete();
        return Redirect::to('adminpage\Ministerios')->with('notice', 'Elemento Eliminado exitosamente!.');
    }
}
