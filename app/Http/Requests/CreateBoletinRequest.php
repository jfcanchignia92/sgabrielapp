<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateBoletinRequest extends Request {

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
			'NT_TIPO' => 'in:vacio,detalle|required',
			'NT_VISIBLE' => 'in:SI|required',
			'NT_TITULO' => 'required_if:NT_TIPO,==,detalle',
			'NT_CONTENIDO' => 'required_if:NT_TIPO,==,detalle',
			/*'NT_FECHA' => 'required|date',*/
			'NT_IMAGEN' => 'required_if:NT_TIPO,==,vacio'
		];
	}

}
