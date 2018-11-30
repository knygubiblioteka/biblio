<h2>Prisijungimas </h2>

<div style=text-align:left>
<div class="content">
    <form class="" action="{{URL::to('/logs')}}" method="post">
        <h2>Prisijungimo vardas</h2> <input type="text" name="prisijungimo_vardas" value="">
        <h2>Slaptažodis</h2> <input type="text" name="slaptazodis" value="">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button type=submit name="button">Prisijungti</button>
    </form>
</div>
</div>
<br>