<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\RegistroBautismal;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateRegistroBautismalRequest;
use App\Http\Requests\UpdateRegistroBautismalRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;


class RegistroBautismalController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$registros = DB::table('registros_bautismales')->orderBy('updated_at', 'desc')->take(10)->get();
		$count = $this->count();
		$data = array('B'=> $registros,'BC'=> $count);
		return view('adminpage.AdminRegistrosBautismales')->with('data', $data);
	}

	public function count()
	{
		$count = DB::table('registros_bautismales')->count();
		return $count +1;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$count = $this->count();
		return view('adminpage.AdminBautismalesCreate')->with('count', $count);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateRegistroBautismalRequest $request)
	{
		$nombre = $request->get('NOMBRE1').' '.$request->get('NOMBRE2').' '.$request->get('APELLIDO1').' '.$request->get('APELLIDO2');
		$fecha = $request->get('FECHA_NACIMIENTO');
		$results = DB::select('SELECT * FROM registros_bautismales where CONCAT(NOMBRE1,\' \', NOMBRE2,\' \', APELLIDO1,\' \', APELLIDO2)= :nombre and FECHA_NACIMIENTO =:fecha', ['nombre' => $nombre, 'fecha'=>$fecha]);
		//dd($results[0]->RGT_NUMERO);
		if(!empty($results))
		{
			return redirect()->back()->withErrors('Ya Existe un registro con ese nombre y fecha de nacimiento. Registro# '.$results[0]->RGT_NUMERO)->withInput($request->all());
		}
		$registro = RegistroBautismal::create($request->except('_token'));
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosBautismales')->with('notice', 'Elemento ingresado exitosamente!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$registro = RegistroBautismal::find($id);
		return $registro;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$registro = RegistroBautismal::findOrFail($id);
		return view('adminpage/AdminBautismalesUpdate')->with('RB',$registro);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateRegistroBautismalRequest $request, $id)
	{
		$registro = RegistroBautismal::findOrFail($id);
		$registro->fill($request->except('_token'));
		$registro->save();
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosBautismales')->with('notice', 'Elemento modificado exitosamente!');

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

	/**
	 * @return mixed
     */
	public function findName()
	{
		$apellido1= strtolower(Input::get('apellido1'));
		$apellido2= strtolower(Input::get('apellido2'));
		if($apellido2 != null)
		{
			$registros = DB::table('registros_bautismales')->where('APELLIDO1','=',$apellido1)->where('APELLIDO2','=',$apellido2)->get();
		}
		else
		{
			$registros = DB::table('registros_bautismales')->where('APELLIDO1','=',$apellido1)->get();
		}
		foreach($registros as $r)
		{
			DB::table('registros_bautismales')
				->where('RGT_NUMERO', $r->RGT_NUMERO)
				->update(['APELLIDO1' => $r->APELLIDO1]);
		}
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosBautismales')->with('resultados', $registros);
	}

	public function findDate()
	{
		$dia = Input::get('dia');
		$mes = Input::get('mes');
		$anio = Input::get('anio');
		$fecha = $anio.'-'.$mes.'-'.$dia;
		if($mes != 0)
		{
			if($dia != null)
			{
				$registros = DB::table('registros_bautismales')->where('RGT_FECHA','=',$fecha)->get();
			}
			else
			{
				$registros = DB::select('select * from registros_bautismales where year(RGT_FECHA) = :anio and month(RGT_FECHA) = :mes', ['anio' => $anio, 'mes' => $mes]);
			}
		}
		else
		{
				$registros = DB::select('select * from registros_bautismales where year(RGT_FECHA) = :anio', ['anio' => $anio]);
		}
		foreach($registros as $r)
		{
			DB::table('registros_bautismales')
				->where('RGT_NUMERO', $r->RGT_NUMERO)
				->update(['APELLIDO1' => $r->APELLIDO1]);
		}
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosBautismales')->with('resultados', $registros);
	}

	public function findRow()
	{
		$numero = Input::get('numero');
		$registros = DB::table('registros_bautismales')->where('RGT_NUMERO','=',$numero)->get();
		foreach($registros as $r)
		{
			DB::table('registros_bautismales')
				->where('RGT_NUMERO', $r->RGT_NUMERO)
				->update(['APELLIDO1' => $r->APELLIDO1]);
		}
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosBautismales')->with('resultados', $registros);
	}

}
