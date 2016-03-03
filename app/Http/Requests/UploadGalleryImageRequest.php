<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadGalleryImageRequest extends Request {

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
			'imageTitle' => 'required',
			'image' => 'required|image|image_size:800,533',

		];
	}

}
