<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateRegistroMatrimonialRequest extends Request {

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
		return [
			'RGT_NUMERO' => 'numeric|required|unique:registros_matrimoniales,RGT_NUMERO',
			'RGT_TOMO' => 'numeric|required',
			'RGT_PAGINA' => 'numeric|required',
			'RGT_FECHA' => 'date|required',
			'ESPOSO_N1' => 'required',
			'ESPOSO_A1' => 'required',
			'ESPOSO_A2' => 'required',
			'ESPOSA_N1' => 'required',
			'ESPOSA_A1' => 'required',
			'ESPOSA_A2' => 'required',
			'RGT_TESTIGOS' => 'required',
			'MISSAM' => 'in:Intra,Extra|required',
			'PARROCO' => 'required'
		];
	}

}
