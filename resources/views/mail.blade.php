<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <link href="../css/app.css" rel="stylesheet">
</head>
<body>
    <ul style=" font-size: 20px;">
        @foreach ($words as $word)

            <li>{{ $word['armenian']}} - {{ $word['english']}} </li>  
        
        @endforeach
    </ul>

    
</body>
</html>