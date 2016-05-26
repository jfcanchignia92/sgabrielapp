<?php namespace App\Http\Controllers;

use App\Ministerio;
use App\InformacionParroquial;
use App\Noticia;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PhpSpec\Exception\Exception;

class StartController extends Controller {
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * @return \Illuminate\View\View
     */

    public function index1()
    {
        return $this->index();
    }
    public function index()
    {
        $boletines = DB::table('noticias')->where('NT_VISIBLE', '=', 'SI')->orderBy('NT_FECHA', 'desc')->get();
        $noticias = DB::select('select *, DATE_FORMAT(NT_FECHA,\'%d/%m/%Y\') as FECHA from noticias where NT_TIPO = \'detalle\' order by NT_FECHA DESC');
        $noticias = array_slice($noticias, 0, 5);
        return view('website.home')/*->with('data',$str)*/->with('boletines', $boletines)->with('noticias', $noticias);
    }
    public function ministerios()
    {
        $ministerios = Ministerio::all();
        //var_dump($ministerios);
        return view('website.ministerios')->with('ministerios',$ministerios);
    }
    public function contactos()
    {
        $informacion = InformacionParroquial::find(1);
        return view('website.contactos')->with('info',$informacion);
    }
    public function online()
    {
        return view('website.online');
    }
    public function noticias()
    {
        $noticias = Noticia::where('NT_TIPO','=','detalle')->orderBy('NT_FECHA')->paginate(15);
        $noticias->setPath('noticia');
        //$noticias = DB::select('select *, DATE_FORMAT(NT_FECHA,\'%d/%m/%Y\') as FECHA from noticias where NT_TIPO = \'detalle\' order by NT_FECHA DESC');
        return view('website.noticia')->with('noticias', $noticias);
    }
    public function acerca()
    {
        $informacion = InformacionParroquial::find(1);
        return view('website.acerca')->with('info',$informacion);
    }
    public function ministerioInfo($nombre)
    {
        $nombre = str_replace("_"," ",$nombre);
        $mini = Ministerio::where('MNT_NOMBRE','=',$nombre)->firstorFail();
        return view('website.ministerioInfo')->with('ministerio',$mini);
    }
    public function servicioOnline($nombre)
    {
        if($nombre=='Reservas'){
            $grid = array();
            $dias = array('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO');
            foreach($dias as $dia){
                $d = "'".$dia."'";
                $query = 'select DATE_FORMAT(HRO_HORAINICIO,\'%Hh%i\') as INICIO, DATE_FORMAT(HRO_HORAFIN,\'%Hh%i\') as FIN, HRO_ID  from horarios where HRO_ESTADO = \'D\' and HRO_DIA = '.$d.' order by INICIO ASC';
                $disponibles = DB::select($query);
                $result = array($dia, $disponibles);
                array_push($grid,$result);
            }
            return view('website.servicioOnline')->with('disponibles',$grid)->with('servicio',$nombre);
        }
        return view('website.servicioOnline')->with('servicio',$nombre);
    }

    public function noticiaInfo($id)
    {
        $noticias = DB::select('select *, DATE_FORMAT(NT_FECHA,\'%d/%m/%Y\') as FECHA from noticias where NT_TIPO = \'detalle\' order by NT_FECHA DESC');
        $noticias = array_slice($noticias, 0, 5);
        $noticia = Noticia::find($id);
        return view('website.noticiaInfo')->with('noticia',$noticia)->with('noticias',$noticias);
    }

    public function buscarCertificados(){
        $tipo = Input::get('tipo');
        $apellido1= strtolower(Input::get('apellido1'));
        $apellido2= strtolower(Input::get('apellido2'));
        if($tipo == 'bautismal')
        {
            if($apellido2 != null)
            {
                $registros = DB::table('registros_bautismales')->where('APELLIDO1','=',$apellido1)->where('APELLIDO2','=',$apellido2)->get();
            }
            else
            {
                $registros = DB::table('registros_bautismales')->where('APELLIDO1','=',$apellido1)->get();
            }

            return Redirect::to('online/Certificados')->with('resultadosB', $registros);
        }
        else
        {
            if($apellido2 != null)
            {
                $registros = DB::select('SELECT * FROM registros_matrimoniales where ESPOSO_A1 = :apellido1H and ESPOSO_A2 = :apellido2H  union SELECT * FROM registros_matrimoniales where ESPOSA_A1 = :apellido1M and ESPOSA_A2 = :apellido2M ', ['apellido1H' => $apellido1, 'apellido2H' => $apellido2, 'apellido1M' => $apellido1, 'apellido2M' => $apellido2]);
            }
            else
            {
                $registros = DB::select('SELECT * FROM registros_matrimoniales where ESPOSO_A1 = :apellidoH  union SELECT * FROM registros_matrimoniales where ESPOSA_A1 = :apellidoM', ['apellidoH' => $apellido1, 'apellidoM' => $apellido1,]);
            }
            return Redirect::to('online/Certificados')->with('resultadosM', $registros);
        }
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
        return view('website.horario')->with('horarios',$grid);
    }

    public function nuevaReserva(){
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
            return Redirect::to(url('online/Reservas'))->with('notice','Tu reserva fue creada, verificalo en el horario!');
        }
        else {
            $input = Input::except('_token');
            $query = "";
            $horarios = '';
            while ($code = current($input)) {
                if ($code == 'D') {
                    $HROID = "'" . key($input) . "'";
                    $query = 'INSERT INTO reservas (HRO_ID, NOMBRES, APELLIDOS, EMAIL) VALUES (' . $HROID . ',' . '\'' . $input['nombres'] . '\'' . ',' . '\'' . $input['apellidos'] . '\'' . ',' . '\'' . $input['mail'] . '\'' . ')';
                    $horarios .= $HROID . ',';
                    //DB::insert($query);
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
                return Redirect::to(url('online/Reservas'))->with('notice','Tu reserva fue creada, verificalo en el horario');
            }

            return Redirect::to(url('online/Reservas'))->with('notice','Tu reserva fue creada y los datos se enviaron v&iacute;a correo, verif&iacute;calo en el horario!');
        }
    }
}