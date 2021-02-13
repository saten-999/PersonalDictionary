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
        src="https://lh3.googleusercontent.com/0PC3jUfvecNJz-F3mz-_0sP54zE1SDHSASBXBlCAMi4OyV1499rL0SlQP544Y_uus0_T8xbHc9ll-Y46qAld8ST069zEfO2trIojPIqkIBiqokXI_u6KXJ05zsvPSFvQ_6wzmMsv9j7ogrnbQ1P3WVfnVyyHNjsDkNEdMYOpm0FJVJP9eOLGI8-d2DORiLotMwl0NIIh2OZVprQ8euovpWRz6zbZCGmD9AcsuNpFMYn69eG3-DTYPNO3OY9B4gen_r6yXQKFnnk5invujnZ53lNWNY3RfcvjDn_nGMcohxNNDDyzOAl5DIqoYCpVdWLgCTsgLzkNDyzsbfrI5taXGlndrafPvHrshEdjYkoy8400Fcs0OgSaAVClmkHousT_CNDdnaUv-kFRZLG05cMbbwESAbFzXATNxhn2PYij_uvcN5PAqjas4WsAGpCGixzN3Y5_4NjZd0DCxIdpD0p-QtawqIYGwSF_qYhhmtK9aDuxBPEzVON-MZxCM1-F7d2AwjjpMbP_7CyjGySTyb0lqYliJabcSsD0MBJYIK1rLKlgZJtPq_RLbSl_X8_fj3iJJ6M4zYzULCbhMK1lW6CIWXljDVwK0I7Xyh8c5l_ofWDF7RfexE5t_R-s3gJ0l7I43NEdDI7oZVq8hhLX25YBoPDuA9ftVQUr_o68FFAhRYWJ3mrVQgdtzQ=w1000-h150-no?authuser=1"
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
            Dictionary Reminder by Asya <br>
        </p>
        
    </div>

    
</body>
</html>