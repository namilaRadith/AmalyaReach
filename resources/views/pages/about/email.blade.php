<?php
//get the first name
$first_name = Input::get('name_contact');
$last_name = Input::get ('lastname_contact');
$phone_number = Input::get('phone_contact');
$email = Input::get ('email_contact');
//$subject = Input::get ('subject');
$message = Input::get ('message_contact');
//$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?>

<h1>We been contacted by.... </h1>

<p>
    First name: <?php echo ($first_name); ?> <br>
    Last name: <?php echo($last_name);?> <br>
    Phone number: <?php echo($phone_number);?><br>
    Email address: <?php echo ($email);?> <br>
    //Subject: <?php echo ($subject); ?><br>
    Message: <?php echo ($message);?><br>
    Date: <?php echo($date_time);?><br>
    //User IP address: <?php echo($userIpAddress);?><br>

</p>
that’s all, we have our Lar