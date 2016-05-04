<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Answer extends Model {

    protected $fillable =['qid','uid','answer'];


    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }

    public static  function addUserFeedback ($data)
    {
        try {
            $userID = \Auth::user()->id;

            foreach ($data['data'] as $d) {
                $answer = new Answer();
                $answer->uid = $userID;
                $answer->qid = $d['id'];
                $answer->answer = $d['value'];
                $answer->save();

            }

            return true;

        } catch (\Exception $e) {

            return false;
        }



    }

    public static function getUserRatingsCountPerQuestion($questionId,$rateValue){
        $count = Answer::where('qid', '=', $questionId)->where('answer', '=', $rateValue)->count();
        return $count;
    }

    public static  function getUsersFeedBacks($questionId){
        $feedback = Answer::where('qid', '=', $questionId)->get();
        return $feedback;
    }
}
