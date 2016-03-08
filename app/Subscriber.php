<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{

    protected $fillable = ['email'];

    /**
     * Check subscribed emails is already avilable
     *
     * @param string $email
     * @return Boolean
     */
    public static function isSubscriberIn($email)
    {


        $count = Subscriber::where('email', '=', $email)->count();

        if ($count == 0) {
            return true;
        } else {
            return false;
        }


    }


    /**
     * Add subscriber
     *
     * @param string $email
     * @return Response
     */
    public static function addSubsciber($email)
    {

        if (self::isSubscriberIn($email)) {
            $subsciber = new Subscriber();
            $subsciber->email = $email;
            $subsciber->save();
            echo 'Thank you for the subscription';

        } else {
            echo 'This email already subscribed';
        }

    }

    public static function removeSubsciber($email)
    {



            $subscriber = Subscriber::where('email', '=', $email)->get();
            $subscriber->delete();

            echo 'Subscription was canceled ';



    }



}
