
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>


          var settings = {
     "async": true,
     "crossDomain": true,
     "url": "http://localhost:8000/api/clinic",
     "method": "GET",
     "headers": {
     "accept": "application/json",
     "content-type": "application/json",
     "authorization": "Bearer {{$auth}}",
     "cache-control": "no-cache",
     "postman-token": "c13fb7c2-b46e-90ba-7efc-3fa6005299f2"
     },
     "processData": false,

     }

     client =$.ajax(settings);
          alert(cleint);


    </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

</head>
<body>
{!! csrf_field() !!}
<h1>Client</h1>
</body>
</html>