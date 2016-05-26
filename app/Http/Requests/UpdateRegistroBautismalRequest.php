<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class UpdateRegistroBautismalRequest extends Request {
	/**
	 * UpdateRegistroBautismalRequest constructor.
	 */
	private $route;

	/**
	 * @param Route $route
     */
	public function __construct(Route $route)
	{
		$this->route = $route;
	}

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
		//$this->route->getParameter('RegistrosBautismales')
		return [
			'RGT_NUMERO' => 'numeric|required|',
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
