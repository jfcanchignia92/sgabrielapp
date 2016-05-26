<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\InformacionParroquial;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAcercaRequest;
use Illuminate\Support\Facades\Redirect;

class AcercaController extends Controller {

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
		$informacion = InformacionParroquial::find(1);
		return view('adminpage.AdminAcerca')->with('info',$informacion);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$informacion = InformacionParroquial::find(1);
		return view('adminpage.AdminAcercaUpdate')->with('info',$informacion);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateAcercaRequest $request, $id)
	{
		$informacion = InformacionParroquial::findOrFail($id);
		$informacion->fill($request->except('_token'));
		$informacion->save();
		return Redirect::to('adminpage/Acerca')->with('notice', 'Elemento modificado exitosamente!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
