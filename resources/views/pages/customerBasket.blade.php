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
        input
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


        </ul>
        <ul class="nav navbar-nav navbar-right">

            <li class="{{Request::is('/')?'active':null}}"><a href="welcome.blade.php"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>        </ul>
    </div>
</nav>

<body>
<html>

    <h2>Krepšelis</h2>


    <br><br>
    <br><br>
    <table class="table table-hover">
        <thead>
        <tr>
            <td>1</td>
            <td>Ponas Tadas</td>
            <td>Adomas Mickevičius</td>
            <td>Poema</td>
            <td>1834</td>
            <td>  <a href=../public/customerBasket><input type=button value='Šalinti'></a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Lazda</td>
            <td>Jonas Biliūnas</td>
            <td>Novelė</td>
            <td>1902</td>
            <td>  <a href=../public/customerBasket><input type=button value='Šalinti'></a></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Lakštingala negali nečiulbėti</td>
            <td>Salomėja Nėris</td>
            <td>Poezija</td>
            <td>1945</td>
            <td>  <a href=../public/customerBasket><input type=button value='Šalinti'></a></td>
        </tr>
        <input type="submit" value="Patvirtinti!">
        <center>
        <tbody>
    </table>


</html>