<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	//

    protected $fillable = ['question','questioner_id','question_type'];



    public function questioner()
    {
        return $this->belongsTo('App\Questioner');
    }

    /**
     * add questions to database
     * @param $data
     * @param $questionerId
     */
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

    /**
     * update questions in database
     * @param $data
     * @param $questionerId
     */
    public static function updateQuestions($data,$questionerId){
        self::deleteQuestions($questionerId);
        self::addQuestions($data,$questionerId);
    }

    /**
     * @param $questionerId
     */
    public static function deleteQuestions($questionerId)
    {
        $question = Question::where('questioner_id', '=', $questionerId)->get();

        foreach ($question as $q) {
            $q->delete();
        }
    }




}
