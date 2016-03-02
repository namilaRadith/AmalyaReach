<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class poolCheckAvailabilityRequest extends Request {

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
			'start_date' => 'required',
			'end_date' => 'required',
			'activity_type' => 'required',
			'age_group' => 'required',
			'ageRange' => 'required'


		];
	}

}
