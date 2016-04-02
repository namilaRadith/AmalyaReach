<html>
<head>


</head>
<body>
<h1>Hello</h1>
   @foreach($rooms as $room)
       {{ $room['id'] }} - {{ $room['name'] }}
       <br>
   @endforeach




</body>


</html>