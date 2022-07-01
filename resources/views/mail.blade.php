<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <link href="../css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.yourwebsite.com/css/app.css">
</head>
<body>
    
    <div id="mail">
        
        <img  
        src="https://lh3.googleusercontent.com/pw/ACtC-3dSTnywNLwtD66H3Tv1zIyG3gp1Ge66zgATpLqLhSTq37rdGHLWqBLggqYv0SZ9KP14Nv1g4I7SA8vJMUmds_UsnBJN_uUy-QMIWvwy4Osg-Kfk9d8PSkNkI4FeeCIa4G3OTYOybMSJMJsWuK7ttQ=w1000-h150-no"
         alt="" >
         <p>
            Hey there, your Dictionary Reminder here! <br> <br>

            Thank you for signing up and I hope you enjoy this process as much as we do. <br> <br>

            Here’s your daily vocabulary reminders! <br><br>
                <div style="color: #8d4f48; margin-left: 25px;">
                    @foreach ($words as $word)
    
                    {{ $word['armenian']}} - {{ $word['english']}} <br>
                
                    @endforeach
                </div>
            <br>
            Don’t forget to come back again tomorrow. <br> <br>

            XoXo, <br>
            <a href="http://perdict.herokuapp.com/">Dictionary Reminder</a> by Asya <br>
        </p>
        
    </div>

    
</body>
</html>