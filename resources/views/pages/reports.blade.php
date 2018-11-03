<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Biblioteka</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('/catalog')?'active':null }}"><a href="{{url('/catalog')}}">Katalogas</a></li>
            <li class="{{Request::is('/ClientManagement')?'active':null }}"><a href="{{url('/ClientManagement')}}">Paskyros valdymas</a></li>
            <li><a href="#">Page 2</a></li>
            <li class="{{Request::is('/reports')?'active':null }}"><a href="{{url('/reports')}}">Ataskaitos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('/')?'active':null}}"><a href="{{url('/')}}"><span class="glyphicon glyphicon-log-out"></span> Atsijungti</a></li>
        </ul>
    </div>
</nav>
<style>
    .dropdown2{
        position: absolute;
        right: 600px;
        font-size: 20px;
        font-weight: bold;
    }
    select[name="tipas"]
    {
        background-color: #a1cbef;
        color: black;
        font-weight: bold;
        font-size: 15px;
        width: 320px;
        height: 40px;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-repeat: no-repeat;
        background-position-x: 100%;
        background-position-y: 5px;
        border: 1px solid #2196F3;
        text-align: center;
    }

    input[value="Rodyti"]
    {
        border: 1px solid #2196F3;
        background-color: #a1cbef;
        color: black;
        font-weight: bold;
        width: 100px;
        height: 40px;
        position: absolute;
        right: 490px;
    }

    table{
        position: absolute;
        right: 145px;
    }

    input[name="from"]
    {
        border: 1px solid #2196F3;
        background-color: #a1cbef;
        position: absolute;
        right: 130px;
        top:102px;
    }
    h3{
        position: absolute;
        right: 300px;
        top:80px;
        font-size: 15px;

    }

</style>
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
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
                <script>
                    $("#datepicker_from").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        format: 'DD-MM-YYYY',
                        startDate: '01-10-2017',
                        onSelect: function (dateText) {
                            $("#datepicker_to").datepicker('option','minDate',dateText);
                        }
                    });
                </script><h3>Pasirinkite datą</h3>
                <input type="date" name="from"/>
                <br>
                <br>
                <!-- DROP DOWN-->
                    <div class="dropdown2">Pasirinkite ataskaitos tipą
                        <br>
                        <br>
                        <select name="tipas">
                            <option value="1">Populiariausios knygos</option>
                            <option value="2">Geriausiai įvertintos knygos</option>
                            <option value="3">Vartotojo žymos</option>
                            <option value="4">Padalinių populiarumas</option>
                            <option value="5">Populiariausios knygos pagal žanrą</option>
                            <option value="6">Populiariausios knygos pagal metus</option>
                        </select>
                    </div>
                <br>
                <br>
                <br>
                    <input type="submit" value="Rodyti">
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
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Moe</td>
                            <td>Melvin Burges</td>
                            <td>Drama</td>
                            <td>2012</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Altorių šešėly</td>
                            <td>Vincas Mykolaitis-Putinas</td>
                            <td>Romanas</td>
                            <td>1933</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Balta drobulė</td>
                            <td>Antanas Škėma</td>
                            <td>Romanas</td>
                            <td>1958</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Dėdės ir dėdienės</td>
                            <td>Juozas Tumas-Vaižgantas</td>
                            <td>Romanas</td>
                            <td>1929</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Anykščių šilelis</td>
                            <td>Antanas Baranauskas</td>
                            <td>Romanas</td>
                            <td>1958</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Sename dvare</td>
                            <td>Šatrijos Ragana</td>
                            <td>Romanas</td>
                            <td>1922</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Ponas Tadas</td>
                            <td>Adomas Mickevičius</td>
                            <td>Poema</td>
                            <td>1834</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Lazda</td>
                            <td>Jonas Biliūnas</td>
                            <td>Novelė</td>
                            <td>1902</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Lakštingala negali nečiulbėti</td>
                            <td>Salomėja Nėris</td>
                            <td>Poezija</td>
                            <td>1945</td>
                        </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </body>
    </html>