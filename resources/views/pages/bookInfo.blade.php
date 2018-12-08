<?php
session_start();
$id = $_GET['bookid'];


$dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
if (!$dbc) {
    die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
}
$sql="select * from knyga, zanras where id_Knyga = $id and zanras=id_zanras";
$result = mysqli_query($dbc, $sql);
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
            <li><a href="#">Page 2</a></li>
            <li class="{{Request::is('/reports')?'active':null }}"><a href="{{url('/reports')}}">Ataskaitos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('/logout')?'active':null}}"><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>
        </ul>
    </div>
</nav>
<body>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
            <h3>Knygos peržiūra</h3><br>
            <div>
                <?php
                $row = mysqli_fetch_array($result); ?>
                <h2>Pavadinimas</h2> <?php echo $row['pavadinimas']; ?>
                <h2>Autorius</h2> <?php echo $row['autorius']; ?>
                <h2>Išleidimo data</h2> <?php echo $row['isleidimo_data']; ?>
                <h2>Leidykla</h2> <?php echo $row['leidykla']; ?>
                <h2>Žanras</h2>  <?php echo $row['name']; ?>
                <h2>Puslapių kiekis</h2> <?php echo $row['puslapiu_kiekis']; ?>
                <h2>ISBN</h2>  <?php echo $row['ISBN']; ?>
                <h2>Knygų kiekis</h2> <?php echo $row['kiekis']; ?>

            <br><br>
    </div>
        <form class="" action="{{URL::to('/addRecomendation')}}" method="post">
            @csrf
            <h3>Pridėkite rekomendaciją:</h3>
            <br>
            <h2>Aprašymas</h2> <input type="text" maxlength="255" name="aprasymas" required>
            <h2>Vertinimas</h2>   <div class="dropdown2">
                <select name="vertinimas">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <br>
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <input type="hidden" name="fk" value="{{$id}}">
            <button type=submit name="button">Patvirtinti</button>
        </form>
    </div>
</div>
</body>
</html>