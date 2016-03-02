<?php namespace App;

use Illuminate\Database\Eloquent\Model;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
use Input;

class SliderImage extends Model {

    protected $fillable = ['title','description','fileName'];

    public function addSliderImage($request)
    {

        $sliderImage = new SliderImage;
        $image = Input::file('img_pre');

        $this->cropImage($request);

        $sliderImage->title = $request->input('silderImageTitle');
        $sliderImage->description = $request->input('silderImageDescription');
        $sliderImage->fileName = 'cropped-' . $image->getClientOriginalName();
        $sliderImage->save();

    }

    public function cropImage($request)
    {
        $x = (int)$request->input('x');
        $y = (int)$request->input('y');
        $width = (int)$request->input('w');
        $height = (int)$request->input('h');

        Image::make(Input::file('img_pre'))->crop($width, $height, $x, $y)->save('client/img/slides_bg/cropped-' . Input::file('img_pre')->getClientOriginalName());

    }

}