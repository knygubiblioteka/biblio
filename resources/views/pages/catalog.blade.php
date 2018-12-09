
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

    input[type="submit"]
    {
        background-color: #A1B0AB;
        color: black;
        font-weight: bold;
        font-size: 15px;
        width: 125px;
        border-radius: 12px;
        font-family: 'Nunito', sans-serif;
    }
    input[type="button"]
    {
        background-color: #A1B0AB;
        color: black;
        font-weight: bold;
        font-size: 15px;
        width: 80px;
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
        position: center;
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
            <li class="{{Request::is('/alltagslist')?'active':null}}"><a href="{{url('/alltagslist')}}"><span class="glyphicon glyphicon-tag"></span></a></li>
            <li class="{{Request::is('/basket')?'active':null}}"><a href="{{url('/basket')}}"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            <li class="{{Request::is('/logout')?'active':null}}"><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>
        </ul>
    </div>
</nav>
<div style='text-align:center'>
<h2 style=>Knygų katalogas</h2>
</div>
<div class="container">
    <div class="col-xs-12 col-md-8">
<form class="" action="{{URL::to('/deleteBook')}}" method="post">
    @csrf
    <?php if($_SESSION["person"]==5)
        {
    echo"
    <input type='text' name='id' placeholder='Įveskite knygos ID'>
    <input type='submit' name='button' value='Šalinti knygą' onclick=\"return confirm('Ar tikrai norite ištrinti knygą?')\"></input>
   ";} ?>
</form>
<?php if($_SESSION["person"]==5)
        {
            echo "
<td class=\"{{Request::is('/book')?'active':null }}\"><a href='../public/book'>Pridėti naują knygą</a></td>
    "; } ?>
    </div>
    </div>


<form action="{{URL::to('/filter')}}"  method="post" >
    @csrf

<br>
    <!-- DROP DOWN-->
    <div class="container">

        <div class="col-xs-12 col-md-8">
            <div class="dropdown2"> Atlikite paiešką:</div>
            <input type="text" placeholder="Ieškoti.." id="myInput" onkeyup="filterFunction()">
            <br> <br>

            <!-- DROP DOWN-->
            <div class="dropdown2">Pasirinkite knygų žanrą:

                <br>
                <select name="filtruoti" class="dropdown2">
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
                <input type="submit" name="filtruot" value="Rodyti" placeholder="Rod">
                <br><br>
            </div>
            <br>

            <script>
                function myFunction() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>
            <script>
                /* When the user clicks on the button,
                toggle between hiding and showing the dropdown content */
                function yourFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }


                function filterFunction() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    div = document.getElementById("myTable");
                    a = div.getElementsByTagName("tr");
                    for (i = 0; i < a.length; i++) {
                        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                            a[i].style.display = "";
                        } else {
                            a[i].style.display = "none";
                        }
                    }
                }
            </script>

            <table class="table table-hover" id="notmyTable">

                <tr class="header">
                    <th>ID</th>
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>Žanras</th>
                    <th>Metai</th>
                </tr>

            </table>

                <table class="table table-hover" id="myTable">

<?php
    $query = "SELECT * FROM knyga, zanras where zanras=id_Zanras";
        $connect = mysqli_connect("localhost", "root", "", "biblioteka");
        $search_result = mysqli_query($connect, $query);
                 while($row = mysqli_fetch_array($search_result)) :?>
                <tr>
                    <td><?php echo $row['id_Knyga'];   $idd =$row['id_Knyga'];?></td>
                    <td><?php echo $row['pavadinimas']; $pav = $row['pavadinimas'];?></td>
                    <td><?php echo $row['autorius'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['isleidimo_data'];?></td>
                    <td><?php echo" <a href=../public/tagslist?bookid=",urlencode($idd),"><input type=button id='$idd' value='Žymos' ></a> " ?></td>

                <td><?php echo" <a href=../public/bookInfo?bookid=",urlencode($idd),"><input type=button id='$idd' value='Peržiūrėti' ></a> " ?></td>
                </tr>

                <?php endwhile;?>

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


