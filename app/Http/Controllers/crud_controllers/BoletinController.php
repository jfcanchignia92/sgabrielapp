<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBoletinRequest;
use App\Http\Requests\UpdateBoletinRequest;

use App\Noticia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class BoletinController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$boletines = DB::table('noticias')->orderBy('NT_FECHA', 'desc')->get();
		return view('adminpage.AdminBoletin')->with('boletines', $boletines);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('adminpage.AdminBoletinCreate');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateBoletinRequest $request)
	{
		$boletin = Noticia::create($request->except('_token'));
		return Redirect::to('adminpage/Boletin')->with('notice', 'Elemento ingresado exitosamente!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$boletin = Noticia::find($id);
		return view('adminpage.AdminBoletinUpdate')->with('boletin',$boletin);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateBoletinRequest $request, $id)
	{
		$noticia = Noticia::findOrFail($id);
		$noticia->fill($request->except('_token'));
		$noticia->save();
		return Redirect::to('adminpage/Boletin')->with('notice', 'Elemento modificado exitosamente!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$noticia = Noticia::findOrFail($id);
		$archivo = $noticia->NT_IMAGEN;
		DB::table('noticias')->where('NT_ID', '=', $id)->delete();
		\Storage::disk('noticias')->delete($archivo);
		return Redirect::to('adminpage/Boletin')->with('notice', 'Elemento Eliminado exitosamente!.');
	}

}
