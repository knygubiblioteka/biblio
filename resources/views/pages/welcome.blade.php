<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biblioteka2</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background: linear-gradient(to bottom right, #A1B0AB, #E0CBA8);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            input[value="Prisijungti"]
            {
                background-color: #A1B0AB;
                color: black;
                font-weight: bold;
                font-size: 15px;
                width: 100px;
                height: 40px;
                position: absolute;
                right: 10px;
                border-radius: 12px;
                font-family: 'Nunito', sans-serif;
            }

            input[value="Registruotis"]
            {
                background-color: #A1B0AB;
                color: black;
                font-weight: bold;
                font-size: 15px;
                width: 100px;
                height: 40px;
                position: absolute;
                right: 115px;
                border-radius: 12px;
                font-family: 'Nunito', sans-serif;
            }

            input:hover {
                background-color: #907D8D;
                color: black;
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
            <div class="content">
                <a href=../public/login><input type=button value='Prisijungti'></a>
                <a href=../public/registration><input type=button value='Registruotis'></a>
                <br>
                <br>
                <div class="title m-b-md">
                    <br>
                    <br>
                    Biblioteka2
                </div>

            </div>
    </body>
</html>