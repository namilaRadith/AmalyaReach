<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class meetingsResRequest extends Request {

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
	//		'dateTo' => 'required',
	//		'dateFrom' => 'required',
	//		'dateFlex' => 'required',
	//		'mtnEvenReq' => 'required',
	//		'locFlex' => 'required',
	//		'noGuests' => 'required',
			'noMeetingRooms' => 'required'
		//	'noGuessRooms' => 'required',
		//	'addDetails' => 'required',
		//	'company' => 'required'



		];
	}

}
