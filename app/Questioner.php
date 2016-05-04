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
        //get active questioner
        $qOld = Questioner::where('active', '=', 1)->get();
        //get authenticated user id
        $user_id = \Auth::user()->id;
        //check whether user alrady answer this questioner
        $count = DB::table('questionerview')->where('questionerview.uid', '=', $user_id)
            ->where('questionerview.quesioner_id', '=', $qOld[0]['id'])->count();

        //count == 0 then return true else false
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

    public static function presentQuestioner()
    {
        //get active questioner


        $questioner = Questioner::where('active', '=', 1)->first();
        $questions = Question::where('questioner_id', '=', $questioner->id)->get();


        return array('questioner' => $questioner, 'questions' => $questions);


    }

    public static function  getQuestionerResults($qid){
        $userCount[]  = array();
        $usersFeedBacks[] = array();

        $questioner = Questioner::find($qid);
        //get all questions
        $questions = Question::where('questioner_id', '=', $questioner->id)->get();

        $j =0;
        foreach($questions as $q){
            for($i = 0 ; $i < 6 ; $i++) {
                $count = Answer::getUserRatingsCountPerQuestion($q->id,$i);
//                echo " ";
//                echo "ID: ".$q->id;
//                echo " ";
//                echo "COUNT: ".$count;
                $userCount['QID_'.$q->id.'_rate_'.$i] =   $count ;

            }

            if($q->question_type == 'A'){
                $usersFeedBacks[$j] = Answer::getUsersFeedBacks($q->id);
                ++$j;
            }
        }

        return array('questioner'=> $questioner , 'questions'=>$questions , 'userCount' =>$userCount,"usersFeedBacks"=>$usersFeedBacks);


    }





}
