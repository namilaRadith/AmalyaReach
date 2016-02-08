<html>
<head>


</head>
<body>

    <form action="xxxx" id="qw" name="qw" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="text" value="{{ $pid }}" name="pid" id="pid">


        <input type="submit" value="Okay">

    </form>




</body>


</html>