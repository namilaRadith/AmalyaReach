<?php
namespace App;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Input;


class GalleryContent extends Model {

	protected $fillable = ['contentType','contentName','contentFileExtension','contentDescription'];


	/**
	 * @param Requests\UploadGalleryImageRequest $request
	 */
	public static function saveContent( $request,$contentType,$contentTitle,$pathToSave)
	{
		$status = false;

		try {

			$galleryContent = new GalleryContent();
			$file = Input::file($contentType);
			$fileName = explode(".", $file->getClientOriginalName());
			$fileExtention = $file->getClientOriginalExtension();

			$fileType = $contentType;
			$fileDescription = $request->input($contentTitle);
			$file->move($pathToSave, $file->getClientOriginalName());
			$galleryContent->contentType = $fileType;
			$galleryContent->contentName = $fileName[0];
			$galleryContent->contentFileExtension = $fileExtention;
			$galleryContent->contentDescription = $fileDescription;
			$galleryContent->save();
			$status = true;

		} catch (Exception $e) {
			$status = false;
		}

		return $status;

	}

	/**
	 * @param $id
	 */
	public static function deleteContent($id,$path)
	{
		$status = false;

		try {
			$galleryContent = GalleryContent::find($id);
			$path .= $galleryContent->contentName . '.' . $galleryContent->contentFileExtension;
			File::Delete($path);
			$galleryContent->delete();
			$status = true;
		} catch (Exception $e) {

		}

		return $status;
	}
}
