<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class meetingRequest extends Request {

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
			'dateTo'=>'required',
			'dateFrom'=>'required',
			'noOfGuessRooms'=>'required|numeric',
			'noOfGuests'=>'required|numeric',
			'noOfMeetingRooms'=>'required|numeric',
			'company' =>'required'
		];
	}



}
