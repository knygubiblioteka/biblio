<h2>Prisijungimas </h2>

<div style=text-align:left>

    <h2>Vartotojo vardas</h2> <input type="text">
    <h2>Slaptažodis</h2> <input type="text">
</div>
<br>
<input type=button onClick="{{Request::is('/catalog')?'active':null }}"><a href="{{url('/catalog')}}">Prisijungti></a>