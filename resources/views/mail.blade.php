<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <script src="../js/app.js" defer></script>
    <link href="../css/app.css" rel="stylesheet">
</head>
<body>

    @foreach ($words as $word)

        <h2>{{ $word['armenian']}} - {{ $word['english']}} </h2>  
        
    @endforeach
</body>
</html>