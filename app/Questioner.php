<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Questioner extends Model {

	//

    protected $fillable = ['questioner_title','publish','user_id'];

    public function questioner()
    {
        return $this->hasMany('App\Question');
    }


    /**
     * create new questioner
     * @param $data
     */
    public static function createQuestioner($data)
    {
        echo $data['questionerTitle']."\n";
        $user = \Auth::user();

        $questioner = new Questioner();
        $questioner->questioner_title = $data['questionerTitle'];
        $questioner->publish = 'NO';
        $questioner->user_id = $user->id;
        $questioner->save();

        $questionerId = $questioner->id;


        Question::addQuestions($data,$questionerId);

    }

}
