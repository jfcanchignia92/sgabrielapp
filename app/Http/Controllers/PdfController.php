<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crud_controllers\RegistroBautismalController;
use App\Http\Controllers\crud_controllers\RegistroMatrimonialController;

use App\InformacionParroquial;
use Illuminate\Http\Request;

class PdfController extends Controller {

	public function certificadoBautismal($numero)
{
	$data = $this->getRegistroBautsimal($numero);
	$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
	$date = 'Quito a, '.date('d').' de '.$meses[date('n')-1].' del '.date('Y');
	$fechareg= explode('-',$data->RGT_FECHA);
	$fechareg[1]= $meses[$fechareg[1]-1];
	$fechanac= explode('-',$data->FECHA_NACIMIENTO);
	$fechanac = $fechanac[2].' de '.$meses[$fechanac[1]-1].' del '.$fechanac[0];
	$data->RGT_FECHA = $fechareg;
	$data->FECHA_NACIMIENTO = $fechanac;
	$parroco = InformacionParroquial::find(1)->INF_NOMBREPARROCO;
	$view =  \View::make('adminpage.CertificadoB', compact('data', 'date', 'parroco'))->render();
	$pdf = \App::make('dompdf.wrapper');
	$pdf->loadHTML($view);
	return $pdf->stream('certificadoBautismal_'.$data->APELLIDO1.'_'.$data->APELLIDO2.'.pdf');
}

	public function getRegistroBautsimal($reg_num)
	{
		$controller = new RegistroBautismalController();
		$registro = $controller->show($reg_num);
		return $registro;
	}
	public function certificadoMatrimonial($numero)
	{
		$data = $this->getRegistroMatrimonial($numero);
		$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		$date = 'Quito a, '.date('d').' de '.$meses[date('n')-1].' del '.date('Y');
		$fechareg= explode('-',$data->RGT_FECHA);
		$fechareg[1]= $meses[$fechareg[1]-1];
		$data->RGT_FECHA = $fechareg;
		$parroco = InformacionParroquial::find(1)->INF_NOMBREPARROCO;
		$view =  \View::make('adminpage.CertificadoM', compact('data', 'date', 'parroco'))->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		return $pdf->stream('certificadoMatrimonial_'.$data->ESPOSO_A1.'_'.$data->ESPOSA_A1.'.pdf');
	}

	public function getRegistroMatrimonial($reg_num)
	{
		$controller = new RegistroMatrimonialController();
		$registro = $controller->show($reg_num);
		return $registro;
	}
}
