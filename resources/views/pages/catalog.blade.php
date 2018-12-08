<?php
session_start();
if(isset($_POST['delete']))
{
    $id = $_POST['id_Knyga'];
    //    echo $id;
    // search in all table columns
    // using concat mysql function
    $query = "DELETE FROM knyga WHERE `id_Knyga`=$id";
    // $query = "SELECT * FROM knyga";
    $search_result = filterTable($query);

}

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM knyga WHERE CONCAT(`pavadinimas`, `autorius`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);

}

else if(isset($_POST['filtruoti']))
{
    $valueToSearch = $_POST['filtr'];
    // search in all table columns
    // using concat mysql function
    if($valueToSearch==0)
        $query = "SELECT * FROM knyga";
    else
        $query = "SELECT * FROM knyga WHERE `zanras`=$valueToSearch";
    $search_result = filterTable($query);

}

else {
    $query = "SELECT * FROM knyga";
    $search_result = filterTable($query);
}
// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "biblioteka");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

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
</head>
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
    h4 {
        color: #ff0000;
        font-family: 'Nunito', sans-serif;
        font-weight: bold;
        font-size: 15px;
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
            <li class="{{Request::is('/ClientManagement')?'active':null }}"><a href="{{url('/ClientManagement')}}">Paskyros valdymas</a></li>
            <li class="{{Request::is('/reports')?'active':null }}"><a href="{{url('/reports')}}">Ataskaitos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('/logout')?'active':null}}"><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>
        </ul>
    </div>
</nav>
<form action="/projektas/public/catalog" method="post">
    <div style='text-align:center'>

        <h2>Knygų katalogas</h2>
    <?php
    if (  $_SESSION["person"] ==5  )
        {
            echo" </div>
    <div style='text-align: right' >
        <td class={{Request::is('/book')?'active':null }}><a href={{url('/book')}}>Pridėti naują knygą</a></td>
        <br>
        <input type='text' name='id_Knyga' placeholder='Įveskite knygos ID'>
        <td> <input type='submit' name='delete' value='Šalinti knygą' onclick='confirm('Ar tikrai norite pašalinti knygą?')'></td>
    </div> ";

        }

        ?>



    <input type="text" name="valueToSearch" placeholder="Ieškoti...">
    <input type="submit" name="search" value="Rodyti"><br><br>

    <br>
    <br>
    <!-- DROP DOWN-->
    <div class="container">

        <div class="col-xs-12 col-md-8">
            <br>
            <br>
            <!-- DROP DOWN-->
            <div class="dropdown2">Pasirinkite knygų žanrą:
                <br>
                <br>
                <select name="filtr" class="dropdown2">
                    <option value="0"></option>
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
            <input type="submit" name="filtruoti" value="Rodyti"><br><br>
            <br>
            <br>

            <br>
            <br>


            <table class="table table-hover" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>Žanras</th>
                    <th>Metai</th>
                </tr>
                </thead>
                <tbody>



                <?php while($row = mysqli_fetch_array($search_result)) :?>

                    <?php $array =array() ?>
                    <td><?php echo $row['id_Knyga'];   $idd =$row['id_Knyga'];?></td>
                    <td><?php echo $row['pavadinimas'];?></td>
                    <td><?php echo $row['autorius'];?></td>
                    <td><?php echo $row['zanras'];?></td>
                    <td><?php echo $row['isleidimo_data'];?></td>
                    <td><?php echo" <a href=../public/tagslist?bookid=",urlencode($idd),"><input type=button id='$idd' value='Žymos' ></a> " ?></td>



                    <td> <a href=>Peržiūrėti</a></td>

                </tr>

                <?php endwhile;?>
                </tbody>
                <?php
                if(!empty($_SESSION['error']))
                {


                    if (   $_SESSION['error']=='klaida'  )
                    {
                        echo "<h4>Ši žyma jau egzistuoja</h4>";
                        $_SESSION['error'] = "";
                    }}
                ?>
            </table>

        </div>
    </div>
    </div>
</form>



</body>
</html>


