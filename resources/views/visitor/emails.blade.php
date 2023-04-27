<!DOCTYPE html>
<html>
<head>
    <title>Creation.com</title>
</head>
<body>
    <h1>{{ $mailData['fname'] }}</h1>
    <h1>{{ $mailData['lname'] }}</h1>

    <p>{{ $mailData['email'] }}</p>
    <p>{{ $mailData['subject'] }}</p>

  
    <p>{{$mailData['message']}}</p>
     
    <p>Thank you</p>
</body>
</html>