<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	//

    protected $fillable = ['question','questioner_id','question_type'];

    public function question()
    {
        return $this->belongsTo('App\Questioner');
    }

    public static function  addQuestions($data,$questionerId){

        foreach($data['Questions'] as $value) {
            //echo $value['question']." ".$value['questionType']."\n";
            $question = new Question();
            $question->question = $value['question'];
            $question->question_type = $value['questionType'];
            $question->questioner_id = $questionerId;
            $question->save();

        }
    }

}
