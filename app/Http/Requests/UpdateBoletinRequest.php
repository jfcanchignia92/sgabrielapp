<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateBoletinRequest extends Request {

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
			'NT_TIPO' => 'in:detalle|required',
			'NT_VISIBLE' => 'in:SI,NO|required',
			'NT_TITULO' => 'required',
			'NT_CONTENIDO' => 'required',
			'NT_IMAGEN' => ''
		];
	}

}
