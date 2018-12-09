<?php
session_start();
$dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
if (!$dbc) {
    die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
}
$unitid = $_GET['unitid'];
$sql ="select * from padalinys where id_Padalinys='$unitid'";
$data=mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($data);
$_SESSION["uniname"]=$row['pavadinimas'];
$_SESSION["unicity"]=$row['miestas'];
$_SESSION["uniadress"]=$row['adresas'];
$_SESSION["unimain"]=$row['vadovas'];
$_SESSION["uninr"]=$row['mob_numeris'];
$_SESSION["uniel"]=$row['el_pastas'];
$_SESSION["uniid"]=$row['id_Padalinys'];

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


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Biblioteka</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="catalog">Katalogas</a></li>
            <li><a href="ClientManagement">Paskyros valdymas</a></li>
            <li><a href="reports">Ataskaitos</a></li>
            <?php
            if (   $_SESSION["person"] == 9 )
            {
                echo" <li><a href='unitManagement'>Padaliniu valdymas</a></li>";
            }
            ?>


        </ul>
        <ul class="nav navbar-nav navbar-right">

            <li class="{{Request::is('/alltagslist')?'active':null}}"><a href="{{url('/alltagslist')}}"><span class="glyphicon glyphicon-tag"></span></a></li>
            <li class="{{Request::is('/basket')?'active':null}}"><a href="{{url('/basket')}}"><span class="glyphicon glyphicon-tag"></span></a></li>
            <li class="{{Request::is('/logout')?'active':null}}"><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>        </ul>
    </div>
</nav>


<html>
<body>
<center>
    <br>
    <h2>Duomenų redagavimas</h2>

    <form class="" action="{{URL::to('/editUnit')}}" method="get">
        Pavadinimas:<br>
        <input type="text" name="pavadinimas" value="<?php echo $_SESSION["uniname"]; ?>">
        <br><br>
        Miestas:<br>
        <input type="text" name="miestas" value="<?php echo $_SESSION["unicity"]; ?>"><br><br>
        Adresas:<br>
        <input type="text" name="adress" value="<?php echo  $_SESSION["uniadress"]; ?>" readonly="readonly"><br>


        <br>
        Vadovas<br>
        <input type="text" name="vadovas" value="<?php echo   $_SESSION["unimain"]; ?>"><br>
        <br>
        Mob_numeris:<br>
        <input type="text" name="mob_nr" value="<?php echo  $_SESSION["uninr"]; ?>"><br>
        <br>
        El.Pašas:<br>
        <input type="text" name="el" value="<?php echo $_SESSION["uniel"]; ?>"><br>
        <br>
        <input type="hidden" name="idd" value="<?php echo $_SESSION["uniid"]; ?>">
        <input type="submit" value="Pakeisti">
    </form>
</center>


</body>
</html>