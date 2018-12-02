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

            <li class="{{Request::is('/')?'active':null}}"><a href="welcome.blade.php"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>        </ul>
    </div>
</nav>


<html>
<body>
<center>
    <br>
    <h2>Duomenų redagavimas</h2>

    <form>
        Vardas:<br>
        <input type="text" name="name" value="Vardenis">
        <br><br>
        Pavarde:<br>
        <input type="text" name="surname" value="Pavardenis"><br>
        <br>Gimimo data:<br>
        <input type="date" name="data"><br>
        <br>

        Lytis   <div class="dropdown">
            <select name="tipas">
                <option value="man">Vyras</option>
                <option value="woman">Moteris</option>

            </select>
            <br><br>
            Telefono numeris:<br>
            <input type="text" name="numer" value="86********"><br>
            <br>
            El. Paštas:<br>
            <input type="text" name="email" value="ttt@gmail.com"><br>
            <br>
            Miestas:<br>
            <input type="text" name="city" value="Kaunas"><br>
            <br>
            naujas slaptažodis:<br>
            <input type="text" name="password" value="****"><br>
            <br>
            Pakartoti slaptažodį:<br>
            <input type="text" name="password2" value="*****"><br>
            <br>
            <input type="submit" value="Pakeisti">
    </form>
</center>


</body>
</html>