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
    private function isSubscriberIn($email)
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
    public function addSubsciber($email)
    {

        if ($this->isSubscriberIn($email)) {
            $subsciber = new Subscriber();
            $subsciber->email = $email;
            $subsciber->save();
            echo 'Thank you for the subscription';

        } else {
            echo 'This email already subscribed';
        }

    }

}
