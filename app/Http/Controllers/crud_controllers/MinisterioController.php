<?php namespace App\Http\Controllers;

use App\Ministerio;
use DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller {
    public function index() {
        $ministerios = Ministerio::all();
        return view('adminpage\AdminMinisterios')->with('ministerios',$ministerios);
    }
    public function show($id) {
        $ministerio = Ministerio::find($id);
        return view('adminpage\AdminMinisterios')->with('ministerio',$ministerio);
    }
    public function create() {
        $ministerio = new Ministerio();
        return view::make('ministerios.save')->with('ministerio',$ministerio);
    }
    public function store() {
        $ministerio = new Ministerio();
        $ministerio->MNT_NOMBRE = Input::get('nombre');
        $ministerio->MNT_DESCRIPCION = Input::get('descripcion');
        $ministerio->MNT_IMG = Input::get('img');
        $ministerio->MNT_INFORMACION = Input::get('informacion');
        $ministerio->save();
        return Redirect::to('adminpage\AdminMinisterios')->with('notice', 'Operacion exitosa.');
    }
    public function edit($id) {
    }
    public function update($id) {
    }
    public function destroy($id) {
    }
}
