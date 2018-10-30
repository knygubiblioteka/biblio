<!DOCTYPE html>
<html lang="en">
<head>
    <title>Biblioteka</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    * {box-sizing: border-box;}

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #e9e9e9;
    }

    .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #2196F3;
        color: white;
    }

    .topnav .search-container {
        float: right;
    }

    .topnav input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: none;
    }

    .topnav .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    .topnav .search-container button:hover {
        background: #ccc;
    }

    @media screen and (max-width: 600px) {
        .topnav .search-container {
            float: none;
        }
        .topnav a, .topnav input[type=text], .topnav .search-container button {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }
        .topnav input[type=text] {
            border: 1px solid #ccc;
        }
    }
</style>
<body>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Biblioteka</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('/catalog')?'active':null }}"><a href="{{url('/catalog')}}">Katalogas</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li class="{{Request::is('/reports')?'active':null }}"><a href="{{url('/reports')}}">Ataskaitos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('/')?'active':null}}"><a href="{{url('/')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>
        </ul>
    </div>
</nav>
<ul class="nav navbar-nav">
<div class="search-container">
        <input type="text" placeholder="Ieškoti.." name="search">
    <input type="submit" value="Rodyti">
</div>
</ul>
<div style='text-align:center'>

        <h2>Knygų katalogas</h2>

</div>
<div style="text-align: right" >
    <td class="{{Request::is('/book')?'active':null }}"><a href="{{url('/book')}}">Pridėti naują knygą</a></td>
</div>


</body>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <br>
            <!-- DROP DOWN-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <br>
            <!-- DROP DOWN-->
            <div class="dropdown2">Pasirinkite knygų žanrą:
                <br>
                <br>
                <select name="tipas">
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
<br>
            <input type="submit" value="Rodyti">
            <br>
            <br>
            <br>
            <br>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>Žanras</th>
                    <th>Metai</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Tarp pilkų debesų</td>
                    <td>Rūta Šepetys</td>
                    <td>Romanas</td>
                    <td>2011</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>

                    <td> <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Moe</td>
                    <td>Melvin Burges</td>
                    <td>Drama</td>
                    <td>2012</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Altorių šešėly</td>
                    <td>Vincas Mykolaitis-Putinas</td>
                    <td>Romanas</td>
                    <td>1933</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Balta drobulė</td>
                    <td>Antanas Škėma</td>
                    <td>Romanas</td>
                    <td>1958</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Dėdės ir dėdienės</td>
                    <td>Juozas Tumas-Vaižgantas</td>
                    <td>Romanas</td>
                    <td>1929</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Anykščių šilelis</td>
                    <td>Antanas Baranauskas</td>
                    <td>Romanas</td>
                    <td>1958</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Sename dvare</td>
                    <td>Šatrijos Ragana</td>
                    <td>Romanas</td>
                    <td>1922</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Ponas Tadas</td>
                    <td>Adomas Mickevičius</td>
                    <td>Poema</td>
                    <td>1834</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Lazda</td>
                    <td>Jonas Biliūnas</td>
                    <td>Novelė</td>
                    <td>1902</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Lakštingala negali nečiulbėti</td>
                    <td>Salomėja Nėris</td>
                    <td>Poezija</td>
                    <td>1945</td>
                    <td class="{{Request::is('/bookInfo')?'active':null }}"><a href="{{url('/bookInfo')}}">Peržiūrėti</a></td>
                    <td>  <a href=>Šalinti</a></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
        </div>
    </div>
</div>
</body>
</html>


