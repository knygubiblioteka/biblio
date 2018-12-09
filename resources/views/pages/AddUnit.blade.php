<?php
session_start();
?>

<head>
    <title>Biblioteka</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        html, body {
            background: linear-gradient(to bottom right, #A1B0AB, #E0CBA8);
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
            height: 100%;
            background-attachment: fixed;
        }

        h2 {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            font-size: 15px;
        }

        button
        {
            background-color: #A1B0AB;
            color: black;
            font-weight: bold;
            font-size: 15px;
            width: 100px;
            border-radius: 12px;
            font-family: 'Nunito', sans-serif;
        }

        button:hover {
            background-color: #907D8D;
            color: black;
            font-family: 'Nunito', sans-serif;
        }

        input {
            border-radius: 12px;
            text-align: center;
            font-family: 'Nunito', sans-serif;
            width: 300px;
        }
        .dropdown2{
            font-size: 20px;
            font-weight: bold;
        }

    </style>
</head>

<html>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Biblioteka</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('/catalog')?'active':null }}"><a href="{{url('/catalog')}}">Katalogas</a></li>
            <li class="{{Request::is('/ClientManagement')?'active':null }}"><a href="{{url('/ClientManagement')}}">Paskyros valdymas</a></li>
            <li class="{{Request::is('/reports')?'active':null }}"><a href="{{url('/reports')}}">Ataskaitos</a></li>
            <?php
            if (   $_SESSION["person"] == 9 )
            {
                echo" <li><a href='unitManagement'>Padaliniu valdymas</a></li>";
            }
            ?>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('/alltagslist')?'active':null}}"><a href="{{url('/alltagslist')}}"><span class="glyphicon glyphicon-tag"></span></a></li>
            <li class="{{Request::is('/basket')?'active':null}}"><a href="{{url('/basket')}}"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            <li class="{{Request::is('/logout')?'active':null}}"><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>
        </ul>
    </div>
</nav>
<body>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <form class="" action="{{URL::to('/addunit')}}" method="get">
            @csrf
            <h3>Naujo padalinio pridėjimas</h3><br>
            <div>
                <h2>Pavadinimas</h2> <input type="text" name="pavadinimas" required>
                <h2>Miestas</h2> <input type="text" name="miestas" required>
                <h2>Adresas</h2> <input type="text" name="adress" required/>
                <h2>vadovas</h2> <input type="text" name="vadovas" required>
                <h2>Mob Numeris</h2> <input type="text" name="mob_nr">
                <h2>El.paštas</h2> <input type="text" name="el">
            </div>
            <br>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type=submit name="button">Patvirtinti</button>
        </form>
    </div>
</div>
</body>
</html>