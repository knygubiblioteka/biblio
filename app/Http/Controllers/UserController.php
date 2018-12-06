<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
session_start();
use Illuminate\Validation;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function validator(array $data)
    {
        return Validator::make($data, [
            'vardas' => 'required|string|max:255',
            'pavarde' => 'required|string|max:255',
            'prisijungimo_vardas' => 'required|string|max:255',
            'el_pastas' => 'required|string|email|max:255|unique:users',
            'slaptazodis' => 'required|string|min:6|confirmed',
        ]);
    }



    public function store(request $request)     //registracijos duomenis iraso i db
    {
        //print_r($request->input());
        $vardas=$request->input('vardas');
        $pavarde=$request->input('pavarde');
        $prisijungimo_vardas=$request->input('prisijungimo_vardas');
        $gimimo_data=$request->input('gimimo_data');
        $mob_numeris=$request->input('mob_numeris');
        $miestas=$request->input('miestas');

        $el_pastas=$request->input('el_pastas');
        $slaptazodis=$request->input('slaptazodis');

        echo DB::insert('insert into vartotojas(vardas, pavarde, gimimo_data, prisijungimo_vardas, slaptazodis, mob_numeris, el_pastas, miestas, 
lytis,id_Vartotojas) values(?,?,?,?,?,?,?,?,?,?)',[$vardas, $pavarde, $gimimo_data, $prisijungimo_vardas, $slaptazodis, $mob_numeris, $el_pastas, $miestas, null, null]);

        return redirect('/login');

    }

    public function logs(request $request)      //paima prisijungimo duomenis is db
    {
        $prisijungimo_vardas=$request->input('prisijungimo_vardas');
        $slaptazodis=$request->input('slaptazodis');

        //$data= DB::select('select id_Vartotojas from vartotojas where prisijungimo_vardas=? and slaptazodis=?',[$prisijungimo_vardas, $slaptazodis]);

        $dbc=mysqli_connect('localhost','root', '','biblioteka');
        if(!$dbc){
            die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($dbc));
        }
        $sql="select * from vartotojas where prisijungimo_vardas='$prisijungimo_vardas' and slaptazodis='$slaptazodis'";
        $data = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_assoc($data);

        if(is_null($row['vardas']))
        {
            echo "klaida";

        }
        else{
            $_SESSION["username"] = $prisijungimo_vardas;
            $_SESSION["password"] = $slaptazodis;


            $_SESSION["name"] = $row['vardas'];
            $_SESSION["surname"] = $row['pavarde'];
            $_SESSION["phone"] = $row['mob_numeris'];
            $_SESSION["el"] = $row['el_pastas'];
            $_SESSION["city"]= $row['miestas'];
            //$_SESSION["data"] = $row['gimimo_data'];
            //$_SESSION["sex"] = $row['lytis'];
            return redirect('/catalog');

        }

    }


    public function editclient(request $request)
    {
        //$data= DB::select('select id_Vartotojas from vartotojas where prisijungimo_vardas=?',$_SESSION["username"]);
        $vardas = $request->input('name');

        $pavarde = $request->input('surname');
        $mob_numeris = $request->input('numer');
        $miestas = $request->input('city');
        $el_pastas = $request->input('email');
        $slaptazodis = $request->input('password');
        $slaptazodis2 = $request->input('password2');

        $usernm = $_SESSION["username"];
        $passwd = $_SESSION["password"];
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql = "UPDATE vartotojas SET vardas='$vardas',pavarde='$pavarde',mob_numeris='$mob_numeris',miestas='$miestas', el_pastas='$el_pastas', slaptazodis ='$slaptazodis'  where prisijungimo_vardas='$usernm' and slaptazodis='$passwd'";
        $sql2 = "UPDATE vartotojas SET vardas='$vardas',pavarde='$pavarde',mob_numeris='$mob_numeris',miestas='$miestas', el_pastas='$el_pastas'  where prisijungimo_vardas='$usernm' and slaptazodis='$passwd'";


        if ($slaptazodis=='')
        {
            var_dump($vardas);

            if (mysqli_query($dbc, $sql2)) {
                $_SESSION["name"] = $vardas;
                $_SESSION["surname"] = $pavarde;
                $_SESSION["phone"] = $mob_numeris;
                $_SESSION["el"] = $el_pastas;
                $_SESSION["city"] = $miestas;

                return redirect('/editClient');
            } else {
                echo "Klaida";
            }

        } elseif($slaptazodis == $slaptazodis2)
        {
            var_dump($pavarde);

            if (mysqli_query($dbc, $sql)) {
                $_SESSION["name"] = $vardas;
                $_SESSION["surname"] = $pavarde;
                $_SESSION["phone"] = $mob_numeris;
                $_SESSION["el"] = $el_pastas;
                $_SESSION["city"] = $miestas;
                $_SESSION["password"]=$slaptazodis;

                return redirect('/editClient');
            }

        }else{$_SESSION["error"]="klaida";
            return redirect('/editClient');
        };


    }




    public function logout(request $request)
    {
        $_SESSION["name"] = NULL;
        $_SESSION["surname"] = NULL;
        $_SESSION["phone"] = NULL;
        $_SESSION["el"] = NULL;
        $_SESSION["city"] = NULL;
        $_SESSION["password"]=NULL;
        $_SESSION["username"]=NULL;

        return redirect('/welcome');
    }

    public function continue(request $request)
    {
        if(empty($_SESSION["username"]))
        {
            return redirect('/welcome');
        }
        else{
            return redirect('/catalog');
        }

    }



}