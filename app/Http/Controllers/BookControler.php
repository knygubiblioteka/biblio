<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookControler extends Controller
{
    public function filter(request $request)
    {
        print_r($request->input());
        $zanras = ($request->input('filtruoti'));
        $ieskoti = ($request->input('valueToSearch'));

        if (!is_null($ieskoti)) {
            //  $valueToSearch = $_POST['valueToSearch'];
            // search in all table columns
            // using concat mysql function
            $query = "SELECT * FROM knyga WHERE CONCAT(`pavadinimas`, `autorius`) LIKE '%" . $ieskoti . "%'";
            // $search_result = filterTable($query);
           // return $query;

        } else if (!is_null($zanras)) {
            //  $valueToSearch = $_POST['filtr'];
            // search in all table columns
            // using concat mysql function
            if ($zanras == 0)
                $query = "SELECT * FROM knyga";
            else
                $query = "SELECT * FROM knyga WHERE `zanras`=$zanras";
            //  $connect = mysqli_connect("localhost", "root", "", "biblioteka");
            //   $search_result = mysqli_query($connect, $query);
            $search_result = $query;
          //  return $search_result;
            //  return redirect('/catalog');
        } else {
            $query = "SELECT * FROM knyga, zanras where zanras=id_Zanras";
            //$search_result = filterTable($query);
            //   setcookie($search_result,$query);
          //  return $query;
        }
// function to connect and execute the query
        return redirect('/catalog');
       // setcookie("$GLOBALS")
    }


    public function addBook(request $request) //Prideti knyga i DB
    {
        $pavadinimas=($request->input('pavadinimas'));
        $autorius=($request->input('autorius'));
        $isleidimo_data=($request->input('isleidimo_data'));
        $leidykla=($request->input('leidykla'));
        $puslapiu_kiekis=($request->input('puslapiu_kiekis'));
        $ISBN=($request->input('ISBN'));
        $kiekis=($request->input('kiekis'));
        $zanras=($request->input('zanras'));

        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        else
        {

          $sql = "INSERT INTO knyga (pavadinimas, autorius, isleidimo_data, leidykla, puslapiu_kiekis, ISBN, kiekis, busena, zanras, id_Knyga, fk_Uzsakymasid_Uzsakymas)
VALUES ('$pavadinimas', '$autorius', '$isleidimo_data', '$leidykla', '$puslapiu_kiekis', '$ISBN', '$kiekis', 2, '$zanras', DEFAULT , null )";
            if (mysqli_query($dbc, $sql))
            {echo "Įrašyta";
                return redirect('/catalog');
                //header("Refresh:0");
                exit;}
            else die ("Klaida įrašant:" .mysqli_error($dbc));
        }
    }

    public function addRecomendation(request $request)
    {
        $aprasymas =($request->input('aprasymas'));
        $vertinimas =($request->input('vertinimas'));
        $fk =($request->input('fk'));

        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }
        else
        {

            $sql = "INSERT INTO rekomendacija (aprasymas, vertinimas, id_Rekomendacija, fk_Knygaid_Knyga)
VALUES ('$aprasymas', '$vertinimas', DEFAULT , '$fk')";
            if (mysqli_query($dbc, $sql))
            {
                echo'
            <script>
            window.onload = function() {
             alert("Rekomendacija sėkmingai pridėta");
            location.href=("/projektas/public/catalog");  
        }
         </script>';}
            else die ("Klaida įrašant:" .mysqli_error($dbc));
        }
    }

    public function deleteBook(request $request)
    {
        $id =($request->input('id'));
        $dbc = mysqli_connect('localhost', 'root', '', 'biblioteka');
        if (!$dbc) {
            die ("Negaliu prisijungti prie MySQL:" . mysqli_error($dbc));
        }

        $sql="select * from knyga where id_Knyga='$id'";
        $data = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_assoc($data);

        if ( is_null($row['pavadinimas']))
        {
            echo'
            <script>
            window.onload = function() {
             alert("Tokia knyga neegzistuoja");
            location.href=("/projektas/public/catalog");  
        }
         </script>';
        }
        else {
            $sql = "DELETE FROM knyga WHERE `id_Knyga`=$id";
            $sql2 = "Delete from rekomendacija where fk_Knygaid_Knyga=$id";
            mysqli_query($dbc,$sql2);
            if (mysqli_query($dbc, $sql) ) {
                echo'
            <script>
            window.onload = function() {
             alert("Knyga sėkmingai ištrinta");
            location.href=("/projektas/public/catalog");  
        }
         </script>';
            }
        }


    }


}
