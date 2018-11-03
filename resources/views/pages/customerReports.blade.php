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


        </ul>
        <ul class="nav navbar-nav navbar-right">

            <li class="{{Request::is('/')?'active':null}}"><a href="welcome.blade.php"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>        </ul>
    </div>
</nav>
<body>
         <center>

             <h2>Ataskaitos</h2>

            Pasirinkite ataskaitos datą nuo:<br>
            <input type="date" name="datafrom" >
            <br><br>
            Pasirinkite ataskaitos datą iki:<br>
            <input type="date" name="datato" >
            <br><br>
            <input type="submit" value="Rodyti">
             <br><br>
             <br><br>
             <table class="table table-hover">
                 <thead>
                 <tr>
                     <th>Nr.</th>
                     <th>Pavadinimas</th>
                     <th>Paėmimo data</th>
                     <th>Grąžinimo data</th>
                 </tr>
                 </thead>
                 <tbody>
                 <tr>
                     <td>1</td>
                     <td>Tarp pilkų debesų</td>
                     <td>2018-02-26</td>
                     <td>2018-03-15</td>
                 </tr>
                 <tr>
                     <td>2</td>
                     <td>Moe</td>
                     <td>2018-02-26</td>
                     <td>2018-03-15</td>
                 </tr>
                 <tr>
                     <td>3</td>
                     <td>Altorių šešėly</td>
                     <td>2018-03-15</td>
                     <td>2018-04-29</td>
                 </tr>
                 </tbody>
             </table>
        <center>
<body>