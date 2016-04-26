<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crud_controllers\RegistroBautismalController;
use App\Http\Controllers\crud_controllers\RegistroMatrimonialController;
use Illuminate\Http\Request;

class CertificadoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$registrosB = new RegistroBautismalController();
		$datosB = $registrosB->index();
		$registrosM = new RegistroMatrimonialController();
		$datosM = $registrosM->index();
		$data = array('B'=> $datosB,'M'=> $datosM);
		//dd($data['B'][0]->RGT_NUMERO." ".$data['B'][0]->feligres->FLG_NOMBRE1." ".$data['B'][0]->feligres->FLG_APELLIDO1);
		return view('adminpage\AdminCertificados')->with('data', $data);
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
