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
        return redirect('/UnitList');
    }

    public function addemployee(request $request)
    {
        $vardas=$request->input('vardas');
        $pavarde=$request->input('pavarde');
        $prisijungimo_vardas=$request->input('pvardas');
        $slaptazodis=$request->input('slaptazodis');
        $mob_numeris=$request->input('mob_nr');
        $el_pastas=$request->input('el');
        $gimimo_data=$request->input('data');
        $Isidarbinimo_data=$request->input('isidata');
        $pareigos=$request->input('pareigos');

        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql = "INSERT INTO darbuotojas(vardas,pavarde,prisijungimo_vardas,slaptazodis,mob_numeris,el_pastas,gimimo_data,Isidarbinimo_data,pareigos,fk_Padalinysid_Padalinys) VALUES('$vardas',' $pavarde','$prisijungimo_vardas','$slaptazodis','$mob_numeris','$el_pastas','$gimimo_data','$Isidarbinimo_data','$pareigos','1')";
        mysqli_query($dbc, $sql);
        return redirect('/EmployeeList');
    }

    public function deleteemployee(request $request)
    {
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $bookid = $_GET['employeeid'];

        $sql = "DELETE darbuotojas from darbuotojas where id_Darbuotojas='$bookid'";

        mysqli_query($dbc, $sql);
        return redirect('/EmployeeList');
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

    public function editemployee(request $request)
    {
        $vardas=$request->input('vardas');
        $pavarde=$request->input('pavarde');
        $prisijungimo_vardas=$request->input('pvardas');
        $slaptazodis=$request->input('slaptazodis');
        $mob_numeris=$request->input('mob_nr');
        $el_pastas=$request->input('el');
        $gimimo_data=$request->input('gdata');
        $Isidarbinimo_data=$request->input('idata');
        $pareigos=$request->input('pareigos');
        $emid=$request->input('idd');
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql2 = "UPDATE darbuotojas SET vardas='$vardas',pavarde='$pavarde',prisijungimo_vardas='$prisijungimo_vardas',slaptazodis='$slaptazodis', mob_numeris='$mob_numeris' , el_pastas='$el_pastas',gimimo_data='$gimimo_data',Isidarbinimo_data='$Isidarbinimo_data',pareigos='$pareigos' where id_Darbuotojas='$emid' ";
        mysqli_query($dbc, $sql2);
        return redirect('/EmployeeList');
    }
}
