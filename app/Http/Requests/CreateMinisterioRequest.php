<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateMinisterioRequest extends Request {

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
			'MNT_NOMBRE' => 'required',
			'MNT_DESCRIPCION' => 'required',
			'MNT_IMG' => 'required',
			'MNT_INFORMACION' => 'required'
		];
	}

}
