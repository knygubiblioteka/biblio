<h2>Registracija</h2>

<div style=text-align:left>
<div class="content">
    <form class="" action="{{URL::to('/store')}}" method="post">
    <h2>Vardas</h2> <input type="text" name="vardas" value="">
    <h2>Pavardė</h2> <input type="text" name="pavarde" value="">
    <h2>Prisijungimo vardas</h2> <input type="text" name="prisijungimo_vardas" value="">
    <h2>Gimimo data</h2> <input type="date" name="gimimo_data" value="">
    <h2>Telefono numeris</h2> <input type="text" name="mob_numeris" value="">
    <h2>Miestas</h2> <input type="text" name="miestas" value="">
    <h2>Lytis</h2> <input type="text" name="lytis" value="">
    <h2>Elektroninis paštas</h2> <input type="email" name="el_pastas" value="">
    <h2>Slaptažodis</h2> <input type="text" name="slaptazodis" value="">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button type=submit name="button">Patvirtinti</button>
    </form>
</div>
</div>