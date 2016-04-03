<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Questioner extends Model {

	//

    protected $fillable = ['questioner_title','publish','user_id','active'];

    /**
     * @return mixed
     */
    public static function isUserEligible()
    {
        $qOld = Questioner::where('active', '=', 1)->get();
        $user_id = \Auth::user()->id;
        $count = DB::table('questionerview')->where('questionerview.uid', '=', $user_id)
            ->where('questionerview.quesioner_id', '=', $qOld[0]['id'])->count();




        if ($count <= 0) {
            return boolval(true);
        } else {
            return boolval(false);
        }
    }

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

        self::deactiveOthers();
        $q = Questioner::find($id);
        $q->active = 1;
        $q->publish = 'YES';
        $q->save();
    }

    public static function deactiveOthers() {

        $qOld = Questioner::where('active', '=', 1)->get();
        $qOld->each(function ($q) {
            $q->active = 0;

            $q->save();
        });
    }

    public static function presentQuestioner(){
        //get active questioner


            $d  = Questioner::where('active', '=', 1)->get();
            $data = DB::table('questionerview')->where('questionerview.quesioner_id', '=',$d[0]->id)->get();


            $array = json_decode(json_encode($data), True);

       return $array ;







    }





}
