<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Questioner extends Model {

	//

    protected $fillable = ['questioner_title','publish','user_id'];

    public function question()
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

    /**
     * @param $id
     * @return bool
     */
    public static  function  isEditable($id){
        if(Questioner::find($id)->publish == 'NO'){
            return true;
        } else {
            return false;
        }
    }

    public static function updateQuestioner($data) {

        $questioner = Questioner::find($data['questionerID']);
        $questioner->questioner_title = $data['questionerTitle'];
        $questioner->save();

        Question::updateQuestions($data,$data['questionerID']);


    }

    public static function makePublic($id){
        $q = Questioner::find($id);
        $q->publish = 'YES';
        $q->save();
    }



}
