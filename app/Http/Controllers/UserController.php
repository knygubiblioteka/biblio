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
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql="select * from vartotojas where prisijungimo_vardas='$prisijungimo_vardas' or slaptazodis='$slaptazodis'";
        $sql2="select * from darbuotojas where prisijungimo_vardas='$prisijungimo_vardas' or slaptazodis='$slaptazodis'";
        $data = mysqli_query($dbc, $sql);
        $data2 = mysqli_query($dbc, $sql2);
        $row = mysqli_fetch_assoc($data);
        $row2 = mysqli_fetch_assoc($data2);
        if ( is_null($row['vardas']) && is_null($row2['vardas'])   ) {
          //  var_dump($row['vardas']);
           // var_dump($row2['vardas']);
          //  die;

            echo DB::insert('insert into vartotojas(vardas, pavarde, gimimo_data, prisijungimo_vardas, slaptazodis, mob_numeris, el_pastas, miestas, 
lytis,id_Vartotojas) values(?,?,?,?,?,?,?,?,?,?)', [$vardas, $pavarde, $gimimo_data, $prisijungimo_vardas, $slaptazodis, $mob_numeris, $el_pastas, $miestas, null, null]);

            return redirect('/login');
        }
        else{
            echo "Jau yra toks slaptažodis arba vartotojo vardas";
        }

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
        $sql2="select * from darbuotojas where prisijungimo_vardas='$prisijungimo_vardas' and slaptazodis='$slaptazodis'";
        $data = mysqli_query($dbc, $sql);
        $data2 = mysqli_query($dbc, $sql2);
        $row = mysqli_fetch_assoc($data);
        $row2 = mysqli_fetch_assoc($data2);
        $dataa = date("Y-m-d");
        $dataatogive = strtotime($dataa. ' + 60 days');

        if(is_null($row['vardas'])&&is_null($row2['vardas']))
        {
            var_dump($row['vardas']);
            var_dump($row2['vardas']);
            die;
            var_dump("nieko nera");
            die;

            $_SESSION["error"]="klaida";
            return redirect('/login');
        }
        elseif(is_null($row2['vardas'])){

            $_SESSION["username"] = $prisijungimo_vardas;
            $_SESSION["password"] = $slaptazodis;

            $_SESSION["person"] = 4;
            $_SESSION["name"] = $row['vardas'];
            $_SESSION["surname"] = $row['pavarde'];
            $_SESSION["phone"] = $row['mob_numeris'];
            $_SESSION["el"] = $row['el_pastas'];
            $_SESSION["city"]= $row['miestas'];
            $_SESSION["id"]= $row['id_Vartotojas'];
            $_SESSION["reports"]= NULL;
            $_SESSION["orderdone"]= NULL;
            $_SESSION["unit"]= 1;
            //$_SESSION["data"] = $row['gimimo_data'];
            //$_SESSION["sex"] = $row['lytis'];
            $user=$_SESSION['id'];
            $uni=$_SESSION['unit'];
            $sql3 = "INSERT INTO uzsakymas(uzsakymo_data,planuojama_grazinimo_data,uzsakymo_busena,fk_Vartotojasid_Vartotojas,fk_Padalinysid_Padalinys) VALUES('$dataa',' $dataatogive','1','$user','$uni')";
            $sql4= "SELECT * FROM uzsakymas ORDER by id_Uzsakymas DESC LIMIT 1 ";
            if (mysqli_query($dbc, $sql3))
            {
                $last = mysqli_query($dbc, $sql4);
                $row3 = mysqli_fetch_assoc($last);
                $_SESSION["order"]=$row3['id_Uzsakymas'];
            }
            return redirect('/catalog');

        }else
        {
            $_SESSION["username"] = $prisijungimo_vardas;
            $_SESSION["password"] = $slaptazodis;
            if (  $prisijungimo_vardas=='admin'  )
            {
                $_SESSION["person"] = 9;
            }
            else{
                $_SESSION["person"] = 5;
            }

            $_SESSION["name"] = $row['vardas'];
            $_SESSION["surname"] = $row['pavarde'];
            $_SESSION["phone"] = $row['mob_numeris'];
            $_SESSION["el"] = $row['el_pastas'];
            $_SESSION["id"]= $row['id_Darbuotojas'];
            $_SESSION["reports"]= NULL;
           // var_dump( $_SESSION["person"]);
            //die;
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
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $order=$_SESSION["order"];
        $_SESSION["name"] = NULL;
        $_SESSION["surname"] = NULL;
        $_SESSION["phone"] = NULL;
        $_SESSION["el"] = NULL;
        $_SESSION["city"] = NULL;
        $_SESSION["password"]=NULL;
        $_SESSION["username"]=NULL;
        $_SESSION["id"]= NULL;
        $_SESSION["reports"]= NULL;
        $_SESSION["order"]=NULL;
        $sql = "DELETE uzsakymas from uzsakymas where id_Uzsakymas='$order'";
        mysqli_query($dbc, $sql);
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

    public function deleteclient(request $request)
    {
        $usernm = $_SESSION["username"];
        $passwd = $_SESSION["password"];

        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql = "DELETE vartotojas from vartotojas where prisijungimo_vardas='$usernm' and slaptazodis='$passwd'";
        if (mysqli_query($dbc, $sql)) {
            $_SESSION["name"] = NULL;
            $_SESSION["surname"] = NULL;
            $_SESSION["phone"] = NULL;
            $_SESSION["el"] = NULL;
            $_SESSION["city"] = NULL;
            $_SESSION["password"]=NULL;
            $_SESSION["username"]=NULL;
            $_SESSION["id"]= NULL;
            $_SESSION["reports"]= NULL;
            return redirect('/welcome');
        }
        return redirect('/catalog');
    }


    public function tagslist(request $request)
    {

        $bookid = $_GET['bookid'];
        $clientid = $_SESSION["id"];
        $today = date("Y-m-d");

        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql2="select * from zyma where fk_Knygaid_Knyga='$bookid' and fk_Vartotojasid_Vartotojas='$clientid'";
        $data=mysqli_query($dbc, $sql2);
        $row = mysqli_fetch_assoc($data);
        $sql = "INSERT INTO zyma(pridejimo_data,fk_Vartotojasid_Vartotojas,fk_Knygaid_Knyga) VALUES('$today','$clientid','$bookid')";
        if ( is_null($row['fk_Knygaid_Knyga']))
        {
            mysqli_query($dbc, $sql);
            return redirect('/catalog');
        }
        else
        {
            $_SESSION["error"]="klaida";
            return redirect('/catalog');
        }

    }


    public function reports(request $request)
    {

        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $from = $request->input('datafrom');
        $to = $request->input('datato');

        $str_start_date = date("Y-m-d H:i:s",strtotime("$from 00:00:00"));
        $str_end_date = date("Y-m-d H:i:s",strtotime("$to 23:59:59"));
        $user=$_SESSION['id'];

        $sql="select uzsakymas.id_Uzsakymas as id_Uzsakymas, knyga.pavadinimas as pavadinimas, uzsakymas.	uzsakymo_data as datanuo, uzsakymas.tikroji_grazinimo_data as dataiki from uzsakymas,knyga where uzsakymas.id_Uzsakymas=knyga.fk_Uzsakymasid_Uzsakymas and uzsakymas.fk_Vartotojasid_Vartotojas='$user' and uzsakymas.uzsakymo_data>= '$str_start_date' and uzsakymas.uzsakymo_data<='$str_end_date' ";
        $result = mysqli_query($dbc, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            var_dump($row['pavadinimas']);
        }

        $_SESSION["reports"]= $sql;

        return redirect('/customerReports');
    }


    public function addtobasket(request $request)
    {
        $fk =($request->input('fk'));
        $user=$_SESSION['id'];
        $uni=$_SESSION['unit'];
        $orderid=$_SESSION["order"];
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $sql="select * from knyga where id_Knyga='$fk' ";
        $result = mysqli_query($dbc, $sql);

        $sql3 = "UPDATE knyga SET fk_Uzsakymasid_Uzsakymas='$orderid'where id_Knyga=$fk";
        mysqli_query($dbc, $sql3);
        return redirect('/catalog');

    }


    public function deletefrombasket(request $request)
    {
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        $bookid = $_GET['bookid'];
        $sql3 = "UPDATE knyga SET fk_Uzsakymasid_Uzsakymas=NULL where id_Knyga=$bookid";
        mysqli_query($dbc, $sql3);
        return redirect('/basket');
    }
}