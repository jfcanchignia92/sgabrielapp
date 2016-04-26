<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Feligres;
use DB;

use Illuminate\Http\Request;

class FeligresController extends Controller {
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($datos)
	{
		$feligres = new Feligres();
		$feligres->FLG_NOMBRE1 = $datos[0];
		$feligres->FLG_NOMBRE2 = $datos[1];
		$feligres->FLG_APELLIDO1 = $datos[2];
		$feligres->FLG_APELLIDO2 = $datos[3];
		$feligres->FLG_SEXO = $datos[4];
		$feligres->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$feligres = Feligres::find($id);
		return $feligres;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id , $datos)
	{
		$feligres = Feligres::find($id);
		$feligres->FLG_NOMBRE1 = $datos[0];
		$feligres->FLG_NOMBRE2 = $datos[1];
		$feligres->FLG_APELLIDO1 = $datos[2];
		$feligres->FLG_APELLIDO2 = $datos[3];
		$feligres->FLG_SEXO = $datos[4];
		$feligres->save();
		return true;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$feligres = Feligres::find($id);
		$feligres->delete();
		return true;
	}

}
