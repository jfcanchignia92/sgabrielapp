<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateAcercaRequest extends Request {

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
			'INF_PARROCO' => 'required',
			'INF_NOMBREPARROCO' => 'required',
			'INF_PARROCOIMG' => 'image',
			'INF_PARROQUIA' => 'required',
			'INF_TELEFONO' => '',
			'INF_EMAIL' => 'required|email',
			'INF_FACEBOOK' => 'url'
		];
	}

}
