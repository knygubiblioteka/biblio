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
        <form class="" action="{{URL::to('/addBook')}}" method="post">
            @csrf
            <h3>Naujos knygos pridėjimas</h3><br>
            <div>
                <h2>Pavadinimas</h2> <input type="text" name="pavadinimas" required>
                <h2>Autorius</h2> <input type="text" name="autorius" required>
                <h2>Išleidimo data</h2> <input type="date" name="isleidimo_data" required/>
                <h2>Leidykla</h2> <input type="text" name="leidykla" required>
                <h2>Žanras</h2>   <div class="dropdown2">
                    <select name="zanras">
                        <option value="1">Fantastika</option>
                        <option value="2">Romanas</option>
                        <option value="3">Novelė</option>
                        <option value="4">Mokslinė</option>
                        <option value="5">Biografija</option>
                        <option value="6">Drama</option>
                        <option value="7">Enciklopedija</option>
                        <option value="8">Detektyvas</option>
                    </select>
                </div>


                <h2>Puslapių kiekis</h2> <input type="number" name="puslapiu_kiekis">
                <h2>ISBN</h2> <input type="number" name="ISBN">
                <h2>Knygų kiekis</h2> <input type="number" name="kiekis">
            </div>
<br>
           <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type=submit name="button">Patvirtinti</button>
        </form>
    </div>
</div>
</body>
</html>