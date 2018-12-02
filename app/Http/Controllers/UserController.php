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

        $data= DB::select('select id_Vartotojas from vartotojas where prisijungimo_vardas=? and slaptazodis=?',[$prisijungimo_vardas, $slaptazodis]);
        if(count($data))
        {
            $_SESSION["username"] = $prisijungimo_vardas;
         //   $result= DB::select('select vardas from vartotojas where prisijungimo_vardas=? and slaptazodis=?',[$prisijungimo_vardas, $slaptazodis]);
           // var_dump($result);
            //die;

                    $_SESSION["name"] = DB::select('select vardas from vartotojas where prisijungimo_vardas=? and slaptazodis=?',[$prisijungimo_vardas, $slaptazodis]);
                  //  var_dump( $_SESSION["name"]);
                 //   die;
                    $_SESSION["surname"] = DB::select('select pavarde from vartotojas where prisijungimo_vardas=? and slaptazodis=?',[$prisijungimo_vardas, $slaptazodis]);
                    $_SESSION["phone"] = DB::select('select mob_numeris from vartotojas where prisijungimo_vardas=? and slaptazodis=?',[$prisijungimo_vardas, $slaptazodis]);
                    $_SESSION["el"] = DB::select('select el_pastas from vartotojas where prisijungimo_vardas=? and slaptazodis=?',[$prisijungimo_vardas, $slaptazodis]);
                    $_SESSION["city"] = DB::select('select miestas from vartotojas where prisijungimo_vardas=? and slaptazodis=?',[$prisijungimo_vardas, $slaptazodis]);


    return redirect('/catalog');

        }
        else
        {
            echo "Neteisingi prisijungimo duomenys";

        }
    }

    public function edit(Request $request)
    {
        //$data= DB::select('select id_Vartotojas from vartotojas where prisijungimo_vardas=?',$_SESSION["username"]);

        //
    }
}