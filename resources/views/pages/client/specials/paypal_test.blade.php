<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="sameerachandrasena-facilitator@gmail.com">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="Type here for what service you charge...">
    <!-- Total amount comes here -->
    <input type="hidden" name="amount" value="100">
    <input type="hidden" name="currency_code" value="USD">

    <input type="hidden" name="return" value="success" />
    <input type="hidden" name="cancel_return" value="cancel" />

    <!-- Display the payment button. -->
    <input type="image" name="submit" border="0" src="{{ asset('client/img/payypal.png') }}" alt="PayPal - The safer, easier way to pay online" width="155px">
    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>