<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ReservaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$grid = array();
		$dias = array('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO');
		foreach($dias as $dia){
			$d = "'".$dia."'";
			$query = 'select DATE_FORMAT(HRO_HORAINICIO,\'%Hh%i\') as INICIO, DATE_FORMAT(HRO_HORAFIN,\'%Hh%i\') as FIN, HRO_ID  from horarios where HRO_ESTADO = \'D\' and HRO_DIA = '.$d.' order by INICIO ASC';
			$disponibles = DB::select($query);
			$result = array($dia, $disponibles);
			array_push($grid,$result);
		}
		$reservas = DB::select('select RSV_ID, NOMBRES, APELLIDOS, EMAIL, HRO_ID, DATE_FORMAT(HRO_HORAINICIO,\'%Hh%i\') as INICIO, DATE_FORMAT(HRO_HORAFIN,\'%Hh%i\') as FIN, HRO_DIA from reservas natural join horarios');
		return view('adminpage.AdminReservas')->with('disponibles',$grid)->with('reservas',$reservas);
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
		if(Input::get('mail') == ""){
			$input = Input::except('_token', 'mail');
			//dd($input);
			$query = "";
			$horarios = "";
			while ($code = current($input)) {
				if ($code == 'D') {
					$HROID ="'".key($input)."'";
					$query = 'INSERT INTO reservas (HRO_ID, NOMBRES, APELLIDOS) VALUES ('.$HROID.','.'\''.$input['nombres'].'\''.','.'\''.$input['apellidos'].'\''.')';
					$horarios.=$query."\n";
					DB::insert($query);
				}
				next($input);
			}
			//mail();
			return Redirect::to(url('adminpage/SalaOracion/Reservas'))->with('notice','Elementos ingresados!');
		}
		else{
			$input = Input::except('_token');
			$query = "";
			$horarios = "";
			while ($code = current($input)) {
				if ($code == 'D') {
					$HROID ="'".key($input)."'";
					$query = 'INSERT INTO reservas (HRO_ID, NOMBRES, APELLIDOS, EMAIL) VALUES ('.$HROID.','.'\''.$input['nombres'].'\''.','.'\''.$input['apellidos'].'\''.','.'\''.$input['mail'].'\''.')';
					$horarios.=$query."\n";
					DB::insert($query);
				}
				next($input);
			}
			$horarios = trim($horarios, ',');
			$email = '"' . Input::get('mail') . '"';
			$nombre = Input::get('nombres') . ' ' . Input::get('apellidos');
			$query = 'select * from horarios where HRO_ID in (' . $horarios . ') order by HRO_HORAINICIO ASC';
			$horarios = DB::select($query);
			try {
				Mail::send('emails.reservaMail', ['nombre' => $nombre, 'horarios' => $horarios], function ($message) use ($email, $nombre) {
					$message->to($email, $nombre)
						->subject("Reserva Sala de Oraci&oacute;n Perpetua!");
				});
			}catch(\Swift_RfcComplianceException $e){
				return Redirect::to(url('online/Reservas'))->with('notice','Reserva fue creada, verificalo en el horario');
			}

			return Redirect::to(url('online/Reservas'))->with('notice','Reserva fue creada y enviada v&iacute;a correo, verif&iacute;calo en el horario!');
		}

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
		DB::table('reservas')->where('RSV_ID', '=', $id)->delete();
		return Redirect::to(url('adminpage/SalaOracion/Reservas'))->with('notice','Elemento Eliminado');
	}

}
