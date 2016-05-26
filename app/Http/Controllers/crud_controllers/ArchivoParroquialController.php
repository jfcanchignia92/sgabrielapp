<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crud_controllers\RegistroBautismalController;
use App\Http\Controllers\crud_controllers\RegistroMatrimonialController;
use Illuminate\Http\Request;

class ArchivoParroquialController extends Controller {

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
		$registrosB = new RegistroBautismalController();
		$countB = $registrosB->count();
		$registrosM = new RegistroMatrimonialController();
		$countM = $registrosM->count();
		$data = array('BC'=> $countB ,'MC'=> $countM);
		return view('adminpage.AdminArchivoParroquial')->with('data', $data);
	}
}
