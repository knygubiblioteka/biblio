<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //
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
            return redirect('/catalog');
        }
        else
        {
            echo "Neteisingi prisijungimo duomenys";
        }
    }
}