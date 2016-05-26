<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMinisterioRequest;
use App\Http\Requests\UpdateMinisterioRequest;
use Illuminate\Support\Facades\Redirect;
use App\Ministerio;
use DB;

class MinisterioController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $ministerios = Ministerio::all();
        return view('adminpage.AdminMinisterios')->with('ministerios',$ministerios);
    }
    public function show($id) {
        $ministerio = Ministerio::find($id);
        return view('adminpage.AdminMinisterios')->with('ministerio',$ministerio);
    }
    public function create(){
        return view('adminpage.AdminMinisteriosCreate');
    }
    public function store(CreateMinisterioRequest $request) {
        $ministerio = Ministerio::create($request->except('_token'));
        return Redirect::to('adminpage/Ministerios')->with('notice', 'Elemento ingresado exitosamente!');
    }
    public function edit($id) {
        $ministerio = Ministerio::findOrFail($id);
        return view('adminpage.AdminMinisteriosUpdate')->with('ministerio',$ministerio);
    }
    public function update(UpdateMinisterioRequest $request,$id)
    {
        $ministerio = Ministerio::findOrFail($id);
        $ministerio->fill($request->except('_token'));
        $ministerio->save();
        return Redirect::to('adminpage/Ministerios')->with('notice', 'Elemento modificado exitosamente!');
    }
    public function destroy($id) {
        DB::table('ministerios')->where('MNT_ID', '=', $id)->delete();
        return Redirect::to('adminpage/Ministerios')->with('notice', 'Elemento Eliminado exitosamente!.');
    }
}
