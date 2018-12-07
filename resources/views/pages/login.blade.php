<?php
session_start();
?>

<head>
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
            height: 100vh;
            margin: 0;
        }

        h2 {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            font-size: 15px;
        }
        h4 {
            color: #ff0000;
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

    </style>
</head>

<html>
<body>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <h3>Prisijunkite prie paskyros </h3><br>
    <form class="" action="{{URL::to('/logs')}}" method="post">
        <h2>Prisijungimo vardas</h2> <input type="text" name="prisijungimo_vardas" value="">
        <h2>Slaptažodis</h2> <input type="password" name="slaptazodis" value="">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <br><br>
        <button type=submit name="button">Prisijungti</button>
        <?php
        if(!empty($_SESSION['error']))
        {


            if (   $_SESSION['error']=='klaida'  )
            {
                echo "<h4>Neteisingai įvestas prisijungimo vardas arba slaptažodis</h4>";
                $_SESSION['error'] = "";
            }}
        ?>
    </form>
</div>
</div>
<br>