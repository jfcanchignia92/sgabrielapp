<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Controllers\crud_controllers\RegistroBautismalController;

class CreateRegistroBautismalRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$registrosB = new RegistroBautismalController();
		$count = $registrosB->count();
		return [
			'RGT_NUMERO' => 'numeric|required|unique:registros_bautismales,RGT_NUMERO|in:'.$count,
			'RGT_TOMO' => 'numeric|required',
			'RGT_PAGINA' => 'numeric|required',
			'RGT_FECHA' => 'date|required',
			'NOMBRE1' => 'required',
			'NOMBRE2' => 'required',
			'APELLIDO1' => 'required',
			'APELLIDO2' => 'required',
			'FECHA_NACIMIENTO' => 'date|required',
			'SEXO' => 'in:H,M|required',
			'PADRE' => '',
			'MADRE' => '',
			'PADRINO' => '',
			'MADRINA' => '',
			'PARROCO' => 'required',
			'CIUDAD' => 'required'
		];
	}

}
