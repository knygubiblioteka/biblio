<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
session_start();

class UnitController extends Controller
{
    public function addunit(request $request)
    {
        $pavadinimas=$request->input('pavadinimas');
        $miestas=$request->input('miestas');
        $adresas=$request->input('adress');
        $vadovas=$request->input('vadovas');
        $mob_numeris=$request->input('mob_nr');
        $el_pastas=$request->input('el');


        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql = "INSERT INTO padalinys(pavadinimas,miestas,adresas,vadovas,mob_numeris,el_pastas) VALUES('$pavadinimas',' $miestas','$adresas','$vadovas','$mob_numeris','$el_pastas')";
        mysqli_query($dbc, $sql);
        return redirect('/UnitManagement');
    }

    public function deleteunit(request $request)
    {
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $bookid = $_GET['unitid'];

        $sql = "DELETE padalinys from padalinys where id_Padalinys='$bookid'";

        mysqli_query($dbc, $sql);
            return redirect('/UnitList');

    }

    public function editUnit(request $request)
    {
        $pavadinimas=$request->input('pavadinimas');
        $miestas=$request->input('miestas');
        $adresas=$request->input('adress');
        $vadovas=$request->input('vadovas');
        $mob_numeris=$request->input('mob_nr');
        $el_pastas=$request->input('el');
        $uniiid=$request->input('idd');
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql2 = "UPDATE padalinys SET pavadinimas='$pavadinimas',miestas='$miestas',adresas='$adresas',vadovas='$vadovas', mob_numeris='$mob_numeris' , el_pastas='$el_pastas' where id_Padalinys='$uniiid' ";
        mysqli_query($dbc, $sql2);
        return redirect('/UnitList');
    }
}
