<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LeadRequest extends Request {
    public  $attributes = [
        "names"=>"nombres",
        "phone"=>"teléfono"
    ];
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
			"names"=>"required|max:255",
            "phone"=>"required|max:45",
            "email"=>"required|email",
            "inquiry"=>"max:2048"
		];
	}

}
