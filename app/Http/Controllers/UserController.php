<?php namespace App\Http\Controllers;

use Andheiberg\Notify\Facades\Notify;
use App\Answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Questioner;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function showMyProfile(){

		$user = \Auth::user();

		return view('pages.client.clientUserProfile')->with("user",$user);
	}

	public  function updateMyProfile(Request $request){

		$user =  User::where('id', '=',$request->input('id') )->first();

		$user->name = $request->input('fname');
		$user->last_name = $request->input('lname');
		$user->address = $request->input('caddress');
		$user->country = $request->input('country');
		$user->phone = $request->input('phone');
		$user->save();

		Notify::success("Your profile updated");
		return redirect()->action('UserController@showMyProfile');

	}

	public function changePassword(){

		if(\Request::ajax()){
			$oldPassword = \Input::get('oldPassword');
			$user = \Auth::user();

			if (\Hash::check($oldPassword, $user->password))
			{
				$user->password= \Hash::make(\Input::get('newPassword'));
				$user->save();
				echo 'true';
			} else {
				echo 'false';
			}

		}

	}

	public function sendFeedback()
	{

		if (\Request::ajax()) {

			$data = \Input::all();
			if (Answer::addUserFeedback($data)) {
				echo 'sucess';
			} else {
				echo 'fail';
			}


		}
	}
}
