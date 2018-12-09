<?php
session_start();
$user=$_SESSION['id'];
$dbc = mysqli_connect("localhost", "root", "", "biblioteka");

if(isset($_GET['submit']))
{
    $value = $_GET['tipas'];
    $from = $_GET['from'];
    $to = $_GET['to'];
    $str_start_date = date("Y-m-d H:i:s",strtotime("$from 00:00:00"));
    $str_end_date = date("Y-m-d H:i:s",strtotime("$to 23:59:59"));
    $zanr = $_GET['zanras_knygos'];

    if($value==1)//knygos kurios yra itrauktos i uzsakymus
    {
        $sql="SELECT * FROM knyga
              WHERE fk_Uzsakymasid_Uzsakymas IS NOT NULL";
        $result = mysqli_query($dbc, $sql);
    }
    if($value==2) //knygos kurios yra ivertintos 5 balais
    {
        $sql="SELECT * FROM rekomendacija INNER JOIN knyga on rekomendacija.fk_Knygaid_Knyga=knyga.id_Knyga WHERE rekomendacija.vertinimas='5'";
        $result = mysqli_query($dbc, $sql);
    }
    if($value==3)   //knygos kurios itrauktos i zymas
    {
        $sql="SELECT DISTINCT id_Knyga, pavadinimas, autorius, isleidimo_data
              FROM knyga INNER JOIN zyma on zyma.fk_Knygaid_Knyga=knyga.id_Knyga";
        $result = mysqli_query($dbc, $sql);
    }
    if($value==4) //knygos is populiariausiu padaliniu
    {
           $pad="SELECT fk_Padalinysid_Padalinys,
                COUNT(fk_Padalinysid_Padalinys)
                FROM uzsakymas
                  WHERE uzsakymo_busena='2'";
        $resultpad = mysqli_query($dbc, $pad);
        $rowpad = mysqli_fetch_array($resultpad);
        $nr = $rowpad['fk_Padalinysid_Padalinys'];
        $sql="select * from knyga INNER JOIN uzsakymas on knyga.fk_Uzsakymasid_Uzsakymas=id_Uzsakymas WHERE fk_Padalinysid_Padalinys = '$nr'";
        $result = mysqli_query($dbc, $sql);
    }
    if($value==5)
    {
        $sql="SELECT * FROM knyga";
        echo "<h2>pasirinkta 5. nebaigta</h2>";
        $result = mysqli_query($dbc, $sql);
    }
    if($value==6) //knygos kuriu uzsakymai uzbaigti pasirinktu laikotarpiu
    {
        $sql="select * from knyga INNER JOIN uzsakymas on knyga.fk_Uzsakymasid_Uzsakymas=id_Uzsakymas WHERE tikroji_grazinimo_data >= '$str_start_date' AND tikroji_grazinimo_data <= '$str_end_date'";
        $result = mysqli_query($dbc, $sql);
    }
}
else{
    $sql="SELECT * FROM knyga";
$result = mysqli_query($dbc, $sql);
}

?>

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
            <li class="{{Request::is('/catalog')?'active':null }}"><a href="{{url('/catalog')}}">Katalogas</a></li>
            <li class="{{Request::is('/ClientManagement')?'active':null }}"><a href="{{url('/ClientManagement')}}">Paskyros valdymas</a></li>
            <li class="{{Request::is('/reports')?'active':null }}"><a href="{{url('/reports')}}">Ataskaitos</a></li>
            <li class="{{Request::is('/UnitManagement')?'active':null }}"><a href="{{url('/UnitManagement')}}">Padaliniu valdymas</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('/')?'active':null}}"><a href="{{url('/')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>
        </ul>
    </div>
</nav>
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
        width: 300px;
        border-radius: 12px;
        height: 25px;
        font-family: 'Nunito', sans-serif;
    }

    select[name="zanras_knygos"]
    {
        background-color: #A1B0AB;
        color: black;
        font-weight: bold;
        font-size: 15px;
        width: 150px;
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
        width: 180px;
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

    <html>
    <body>

                <form method = "get">
                <div class="dropdown2">Pasirinkite ataskaitos tipą
                    <br>
                    <br>
                    <select name="tipas">
                        <option value="1">Populiariausios knygos</option>
                        <option value="2">Geriausiai įvertintos knygos</option>
                        <option value="3">Vartotojų žymos</option>
                        <option value="4">Padalinių populiarumas</option>
                        <option value="5">Populiariausios knygos pagal žanrą</option>
                        <option value="6">Populiariausios knygos pagal metus</option>
                    </select>
                    <input type="date" name="from"/><input type="date" name="to"/><input name = "submit" type="submit" value="Rodyti">

                </div>
                <br>
                    <div class="container">
                        <div class="col-xs-12 col-md-8">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nr.</th>
                            <th>Pavadinimas</th>
                            <th>Autorius</th>
                            <th>Metai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_array($result)) :?>

                        <?php $array =array() ?>
                        <td><?php echo $row['id_Knyga'];?></td>
                        <td><?php echo $row['pavadinimas'];?></td>
                        <td><?php echo $row['autorius'];?></td>
                        <td><?php echo $row['isleidimo_data'];?></td>

                        </tr>

                        <?php endwhile;?>
                        </tbody>
                    </table>
                </form>
        </div>
    </div>
    </body>
    </html>

