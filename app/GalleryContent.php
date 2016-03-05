<?php
namespace App;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Input;
use Intervention\Image\ImageManagerStatic as Image;





class GalleryContent extends Model {

	protected $fillable = ['contentType','contentName','contentFileExtension','contentDescription'];


	/**
	 * add gallery content to the database
	 * @param $request
	 * @param $contentType
	 * @param $contentTitle
	 * @param $pathToSave
	 * @return bool
	 * @throws \Exception
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

		} catch (\Exception $e) {
			$status = false;
		}

		return $status;

	}

	public static function saveContentImage( $request,$contentType,$contentTitle,$pathToSave)
	{
		$status = false;

		try {

			$galleryContent = new GalleryContent();
			$file = Input::file($contentType);
			$fileName = explode(".", $file->getClientOriginalName());
			$fileExtention = $file->getClientOriginalExtension();
			self::cropImage($request,$pathToSave);
			$fileType = 'image';
			$fileDescription = $request->input($contentTitle);

			$galleryContent->contentType = $fileType;
			$galleryContent->contentName = 'cropped-'.$fileName[0];
			$galleryContent->contentFileExtension = $fileExtention;
			$galleryContent->contentDescription = $fileDescription;
			$galleryContent->save();
			$status = true;

		} catch (\Exception $e) {
			$status = false;
		}

		return $status;

	}

	public static function cropImage($request,$pathToSave)
	{
		$x = (int)$request->input('x');
		$y = (int)$request->input('y');
		$width = (int)$request->input('w');
		$height = (int)$request->input('h');

		Image::make(Input::file('img_pre'))->crop($width, $height, $x, $y)->save($pathToSave.'/cropped-' . Input::file('img_pre')->getClientOriginalName());

	}


	/**
	 * delete content from the database
	 * @param $id
	 * @param $path
	 * @return bool
	 * @throws \Exception
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
