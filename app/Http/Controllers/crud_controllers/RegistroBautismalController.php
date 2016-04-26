<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crud_controllers\FeligresController;
use Illuminate\Http\Request;
use App\RegistroBautismal;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class RegistroBautismalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$feligres = new FeligresController();
		$registros = RegistroBautismal::all()->take(10);
		$dataRegistros = array();
		foreach($registros as $reg)
		{
			$flg= $feligres->show($reg->FLG_ID);
			$reg->feligres()->associate($flg);
			array_push($dataRegistros,$reg);
		}
		return $dataRegistros;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$registro = new RegistroBautismal();
		$feligres = new FeligresController();
		$flg_id= DB::table('feligreses')->select('FLG_ID')->where('FLG_APELLIDO1', '=', Input::get('Bapellido1'))->where('FLG_APELLIDO2', '=', Input::get('Bapellido2'))->where('FLG_NOMBRE1', '=', Input::get('Bnombre1'))->where('FLG_NOMBRE2', '=', Input::get('Bnombre2'))->get();
		if($flg_id !=null)
		{
			$flg= $feligres->show($flg_id);
			$registro->feligres()->associate($flg);
		}
		else{
			$flg = $feligres->store(array(Input::get('Bnombre1'),Input::get('Bnombre2'),Input::get('Bapellido1'),Input::get('Bapellido2'),'F'));
			$flg_id= DB::table('feligreses')->select('FLG_ID')->where('FLG_APELLIDO1', '=', Input::get('Bapellido1'))->where('FLG_APELLIDO2', '=', Input::get('Bapellido2'))->where('FLG_NOMBRE1', '=', Input::get('Bnombre1'))->where('FLG_NOMBRE2', '=', Input::get('Bnombre2'))->get();
			dd($flg_id);
			$registro->feligres()->associate($flg_id);
		}
		$registro->RGT_TOMO = Input::get('Btomo');
		$registro->RGT_PAGINA = Input::get('Bpagina');
		$registro->RGT_NUMERO = Input::get('Bnumero');
		$registro->RGT_FECHA = Input::get('B_fecha');
		$registro->RGT_FECHA_NACIMIENTO = Input::get('B_fechaN');
		$registro->RGT_PADRE = Input::get('Bpadre');
		$registro->RGT_MADRE = Input::get('Bmadre');
		$registro->RGT_PADRINO = Input::get('Bpadrino');
		$registro->RGT_MADRINA = Input::get('Bmadrina');
		$registro->RGT_PARROCO = Input::get('Bparroco');
		$registro->save();
		return Redirect::to('adminpage\Certificados')->with('notice', 'Elemento ingresado exitosamente!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
