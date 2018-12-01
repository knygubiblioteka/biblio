<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

<html>
<body>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
    <form class="" action="{{URL::to('/store')}}" method="post">
        <h3>Vartotojo registracija</h3><br>
    <input type="text" name="vardas" placeholder="Įveskite vardą" value=""><br>
        <br>
    <input type="text" name="pavarde" placeholder="Įveskite pavardę" value=""><br>
        <br>
    <input type="text" name="prisijungimo_vardas" placeholder="Įveskite prisijungimo vardą" value=""><br>
        <br>
    <input type="date" name="gimimo_data" placeholder="Įveskite gimimo datą" value=""><br>
        <br>
    <input type="text" name="mob_numeris" placeholder="Įveskite mob. numerį" value=""><br>
        <br>
    <input type="text" name="miestas" placeholder="Įveskite miestą" value=""><br>
        <br>
    <input type="text" name="lytis" placeholder="Pasirinkite" value=""><br>
        <br>
    <input type="email" name="el_pastas" placeholder="Įveskite el. paštą" value=""><br>
        <br>
    <input type="text" name="slaptazodis" placeholder="Įveskite slaptažodį" value=""><br>
        <br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button type=submit name="button">Patvirtinti</button>
    </form>
    </div>
</div>
</body>
</html>