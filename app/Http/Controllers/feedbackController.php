<?php namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests;
//use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Request;

class feedbackController extends Controller {

	function index()
    {
        $feedbacks=Feedback::latest('published_at')->get();

        return view('pages.feedbacks.index')->with('feedbacks',$feedbacks);



    }


    function show($recordId)
    {
        $feedbacks=Feedback::find($recordId);

        //return $recordId;

       return view('pages.feedbacks.show')->with('feedbacks',$feedbacks);

    }


    function create()
    {

        return view('pages.feedbacks.create');

    }


    function store(Requests\createFeedbackRequest $request)
    {
           $input=Request::all();
            $input['published_at']=Carbon::now();
           Feedback::create($input);
           return redirect('feedback');

    }


}
