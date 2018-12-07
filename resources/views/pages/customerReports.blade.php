<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Biblioteka</title>
    <meta charset="utf-8">
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

        .dropdown2{
            font-size: 20px;
            font-weight: bold;
        }
        select[name="tipas"]
        {
            background-color: #A1B0AB;
            color: black;
            font-weight: bold;
            font-size: 15px;
            width: 250px;
            border-radius: 12px;
            height: 25px;
            font-family: 'Nunito', sans-serif;
        }

        input[value="Rodyti"]
        {
            background-color: #A1B0AB;
            color: black;
            font-weight: bold;
            font-size: 15px;
            width: 100px;
            border-radius: 12px;
            font-family: 'Nunito', sans-serif;
        }
        input:hover {
            background-color: #907D8D;
            color: black;
            font-family: 'Nunito', sans-serif;
        }
        input[type="date"]
        {
            background-color: #A1B0AB;
            color: black;
            font-weight: bold;
            font-size: 15px;
            width: 150px;
            border-radius: 12px;
            font-family: 'Nunito', sans-serif;
        }
        table{
            position: absolute;
            right: 145px;
        }
        h3{
            position: absolute;
            right: 300px;
            top:80px;
            font-size: 15px;

        }

    </style>
</head>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Biblioteka</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="catalog">Katalogas</a></li>
            <li><a href="ClientManagement">Paskyros valdymas</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="reports">Ataskaitos</a></li>
            <li><a href="reports">Padaliniu valdymas</a></li>


        </ul>
        <ul class="nav navbar-nav navbar-right">

            <li class="{{Request::is('/logout')?'active':null}}"><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>         </ul>
    </div>
</nav>
<body>
<center>

    <h2>Ataskaitos</h2>

    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form class="" action="{{URL::to('/reportslist')}}" method="get">
                Pasirinkite ataskaitos datą nuo:<br>
                <input type="date" name="datafrom" value="">
                <br><br>
                Pasirinkite ataskaitos datą iki:<br>
                <input type="date" name="datato" value="">
                <br><br>
                <button type=submit name="button">Rodyti</button>
            </form>
        </div>
    </div>




</center>



<table class="table table-hover" >
    <thead>
    <tr>
        <th>Nr.</th>
        <th>Pavadinimas</th>
        <th>paėmimo data</th>
        <th>grąžinimo data</th>

    </tr>
    </thead>
    <tbody>



    <?php
    $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
    if (!$dbc) {
        die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
    }
    $sql = $_SESSION["reports"];
    if (!is_null($sql))
        {
            $result = mysqli_query($dbc, $sql);
        }
        else {$result=NULL;}

    if (!is_null($result))
    while($row = mysqli_fetch_array($result)) :?>

    <?php $array =array() ?>
    <td><?php echo $row['id_Uzsakymas']; ?></td>
    <td><?php echo $row['pavadinimas'];?></td>
    <td><?php echo $row['datanuo'];?></td>
    <td><?php echo $row['dataiki'];?></td>


    </tr>

    <?php endwhile;?>
    </tbody>
</table>
</body>
</html>