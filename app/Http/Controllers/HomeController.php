<?php namespace App\Http\Controllers;

use App\Ministerio;
use App\RegistroBautismal;
use DB;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Redirect::to('adminpage\Inicio');
	}
	public function inicio()
	{
		return view('adminpage\home');
	}
	public function  ministerios()
	{
		$ministerios = Ministerio::all();
		//var_dump($ministerios);
		return view('adminpage\AdminMinisterios')->with('ministerios',$ministerios);
	}
	public function  certificados()
	{
		$registros = RegistroBautismal::all();
		return view('adminpage\AdminCertificados')->with('registros',$registros);
	}
}
