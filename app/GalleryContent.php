<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryContent extends Model {

	protected $fillable = ['contentType','contentName','contentFileExtension','contentDescription'];

}
