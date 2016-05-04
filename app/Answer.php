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
        $userID = \Auth::user()->id;
        foreach($data['data'] as $d){
            $answer = new Answer();
            $answer->uid = $userID;
            $answer->qid = $d['id'];
            $answer->answer = $d['value'];
            $answer->save();


            echo $d['id'] ." ". $d['value']."\n";
        }
    }
}
