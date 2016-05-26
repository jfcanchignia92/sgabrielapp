<?php namespace App\Http\Controllers\crud_controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Horario;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SalaOracionController extends Controller {

	//
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('adminpage.AdminSalaOracion');
    }

    public function horario()
    {
        $grid = array();
        $dias = array('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO');
        for($i=0; $i<24; $i++){
            $fila = array();
            foreach($dias as $dia)
            {
                $string = "'L".$i."','M".$i."','X".$i."','J".$i."','V".$i."','S".$i."','D".$i."'";
                $d = "'".$dia."'";
                $query = 'select * from horarios natural join reservas where horarios.HRO_ESTADO = \'D\' and horarios.HRO_ID in ('.$string.') and horarios.HRO_DIA = '.$d;
                $disponibles = DB::select($query);
                array_push($fila,$disponibles);
            }
            array_push($grid,$fila);
        }
        //dd($grid);
        return view('adminpage.HorarioCompleto')->with('horarios',$grid);
    }

    public function disponibilidad()
    {
        $disponibles = DB::select('select HRO_ID from horarios where HRO_ESTADO = :estado', ['estado' => 'D']);
        $array = array();
        foreach($disponibles as $d){
            array_push($array,$d->HRO_ID);
        }
        //dd($array);
        return view('adminpage.DisponibilidadHorarios')->with('horarios',$array);
    }

    public function save()
    {
        $input = Input::except('_token');
        $input = array_keys($input);
        $in = "";
        foreach($input as $id){
            $in.='\''.$id.'\',';
        }
        $in = trim($in,',');
        $queryin = 'update horarios set HRO_ESTADO = \'D\' where HRO_ID IN ('.$in.')';
        $querynot = 'update horarios set HRO_ESTADO = \'N\' where HRO_ID NOT IN ('.$in.')';
        //dd($query);
        DB::update($queryin);
        DB::update($querynot);
        return redirect('adminpage/SalaOracion');
    }

}
