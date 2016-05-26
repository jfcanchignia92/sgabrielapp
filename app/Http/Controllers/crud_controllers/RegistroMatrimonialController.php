<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RegistroMatrimonial;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateRegistroMatrimonialRequest;
use App\Http\Requests\UpdateRegistroMatrimonialRequest;

class RegistroMatrimonialController extends Controller {

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
		$registros = DB::table('registros_matrimoniales')->orderBy('updated_at', 'desc')->take(10)->get();
		$count = $this->count();
		$data = array('M'=> $registros,'MC'=> $count);
		return view('adminpage.AdminRegistrosMatrimoniales')->with('data', $data);
	}

	public function count()
	{
		$count = DB::table('registros_matrimoniales')->count();
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
		return view('adminpage.AdminMatrimonialesCreate')->with('count',$count);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateRegistroMatrimonialRequest $request)
	{
		$registro = RegistroMatrimonial::create($request->except('_token'));
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosMatrimoniales')->with('notice', 'Elemento ingresado exitosamente!');
		/*
		$registro = new RegistroMatrimonial();
		$registro->RGT_TOMO = Input::get('tomo');
		$registro->RGT_PAGINA = Input::get('pagina');
		$registro->RGT_NUMERO = Input::get('numero');
		$registro->RGT_FECHA = Input::get('mfecha');
		$registro->MISSAM = Input::get('tipo');
		$registro->PARROCO = Input::get('parroco');
		$registro->ESPOSO_N1 = Input::get('esposon1');
		$registro->ESPOSO_N2 = Input::get('esposon2');
		$registro->ESPOSO_A1 = Input::get('esposoa1');
		$registro->ESPOSO_A2 = Input::get('esposoa2');
		$registro->ESPOSA_N1 = Input::get('esposan1');
		$registro->ESPOSA_N2 = Input::get('esposan2');
		$registro->ESPOSA_A1 = Input::get('esposaa1');
		$registro->ESPOSA_A2 = Input::get('esposaa2');
		for($i = 1 ; $i<11; $i++)
		{
			if($i!=1)
				$testigos = $testigos.'; '.Input::get('testigo'.$i);
			else
				$testigos = Input::get('testigo'.$i);
		}
		dd($registro);
		$registro->save();
		return Redirect::to('adminpage\ArchivoParroquial')->with('noticeM', 'Elemento ingresado exitosamente!');*/
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$registro = RegistroMatrimonial::find($id);
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
		$registro = RegistroMatrimonial::findOrFail($id);
		return view('adminpage.AdminMatrimonialesUpdate')->with('RM',$registro);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UpdateRegistroMatrimonialRequest $request, $id)
	{
		$registro = RegistroMatrimonial::findOrFail($id);
		$registro->fill($request->except('_token'));
		$registro->save();
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosMatrimoniales')->with('notice', 'Elemento modificado exitosamente!');
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

	public function findName()
	{
		$apellido1= strtolower(Input::get('apellido1'));
		$apellido2= strtolower(Input::get('apellido2'));
		if($apellido2 != null)
		{
			$registros = DB::select('SELECT * FROM registros_matrimoniales where ESPOSO_A1 = :apellido1H and ESPOSO_A2 = :apellido2H  union SELECT * FROM registros_matrimoniales where ESPOSA_A1 = :apellido1M and ESPOSA_A2 = :apellido2M ', ['apellido1H' => $apellido1, 'apellido2H' => $apellido2, 'apellido1M' => $apellido1, 'apellido2M' => $apellido2]);
		}
		else
		{
			$registros = DB::select('SELECT * FROM registros_matrimoniales where ESPOSO_A1 = :apellidoH  union SELECT * FROM registros_matrimoniales where ESPOSA_A1 = :apellidoM', ['apellidoH' => $apellido1, 'apellidoM' => $apellido1,]);
		}
		foreach($registros as $r)
		{
			DB::table('registros_matrimoniales')
				->where('RGT_NUMERO', $r->RGT_NUMERO)
				->update(['RGT_NUMERO' => $r->RGT_NUMERO]);
		}
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosMatrimoniales')->with('resultados', $registros);
	}

	public function findDate()
	{
		$dia = Input::get('dia');
		$mes = Input::get('mes');
		$anio = Input::get('anio');
		$fecha = $anio.'-'.$mes.'-'.$dia;
		if($mes != 0)
		{
			if($dia != "")
			{
				$registros = DB::table('registros_matrimoniales')->where('RGT_FECHA','=',$fecha)->get();
			}
			else
			{
				$registros = DB::select('select * from registros_matrimoniales where year(RGT_FECHA) = :anio and month(RGT_FECHA) = :mes', ['anio' => $anio, 'mes' => $mes]);
			}
		}
		else
		{
			$registros = DB::select('select * from registros_matrimoniales where year(RGT_FECHA) = :anio', ['anio' => $anio]);
		}
		foreach($registros as $r)
		{
			DB::table('registros_matrimoniales')
				->where('RGT_NUMERO', $r->RGT_NUMERO)
				->update(['RGT_NUMERO' => $r->RGT_NUMERO]);
		}
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosMatrimoniales')->with('resultados', $registros);
	}

	public function findRow()
	{
		$numero = Input::get('numero');
		$registros = DB::table('registros_matrimoniales')->where('RGT_NUMERO','=',$numero)->get();
		foreach($registros as $r)
		{
			DB::table('registros_matrimoniales')
				->where('RGT_NUMERO', $r->RGT_NUMERO)
				->update(['RGT_NUMERO' => $r->RGT_NUMERO]);
		}
		return Redirect::to('adminpage/ArchivoParroquial/RegistrosMatrimoniales')->with('resultados', $registros);
	}

}
