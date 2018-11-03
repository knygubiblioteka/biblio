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
<style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<body>
<br>
<center>
    <a href=../public/editClient><input type=button value='Keisti duomenis'></a>
    <br><br>
    <a href=../public/customerReports><input type=button value='Kliento ataskaitos'></a>
    <br><br>
    <a href=../public/customerBasket><input type=button value='Knygų krepšelis'></a>
    <br><br>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Šalinti paskyrą</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Ar tikrai norite pašalintin paskyrą?</p>
            <input type="submit" value="Patvirtinti">
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

        <center>
<body>

