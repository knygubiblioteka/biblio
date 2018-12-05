<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function showtable(request $request)
    {
        $tipas = $request->input('tipas');
        $from = $request->input('from');
        $to = $request->input('to');
        $str_start_date = date("Y-m-d H:i:s",strtotime("$from 00:00:00"));
        $str_end_date = date("Y-m-d H:i:s",strtotime("$to 23:59:59"));
        echo $tipas;
        switch ($tipas) {
            case '1':
                echo 'pasirinkta populiariausia';
                break;
            case '2':
                echo 'pasirinkta antra';
                break;
            case '3':
                echo 'pasirinkta trecia';
                break;
            case '4':
                echo 'pasirinkta ketvirta';
                break;
            case '5':
                echo 'pasirinkta penki';
                break;
            case '6':
                $id_Knyga = DB::table('knyga')->where('isleidimo_data', '>=',$str_start_date)->
                where('isleidimo_data','<=',$str_end_date)->value('pavadinimas');

                $pavadinimas = DB::table('knyga')->where('isleidimo_data', '>=',$str_start_date)->
                where('isleidimo_data','<=',$str_end_date)->value('pavadinimas');

                $autorius = DB::table('knyga')->where('isleidimo_data', '>=',$str_start_date)->
                where('isleidimo_data','<=',$str_end_date)->value('autorius');

                $isleidimo_data = DB::table('knyga')->where('isleidimo_data', '>=',$str_start_date)->
                where('isleidimo_data','<=',$str_end_date)->value('isleidimo_data');

                $Knygos = DB::table('knyga')->where('isleidimo_data', '>=',$str_start_date)->
                where('isleidimo_data','<=',$str_end_date)->get();

                // $results = DB::select('select id_Knyga from knyga where isleidimo_data>=$str_start_date and isleidimo_data<=$str_end_date', ['id' => 1]);
                // echo $knyga;
                /*$knygos = array('id_Knyga' => $id_Knyga,
                    'pavadinimas' => $pavadinimas,
                    'autorius' => $autorius,
                    'isleidimo_data' => $isleidimo_data);*/

                // return view('pages.welcome')->with($knygos);
                return view('pages.reports', compact('Knygos'));
                break;
        }
       // return redirect('/reports');

        /*$tables = ['populiariausia', 'ivertintos', 'zymos', 'padaliniai','zanras','metai'];
        $from = $request->input('from');
        $to = $request->input('to');
        $str_start_date = date("Y-m-d H:i:s",strtotime("$from 00:00:00"));
        $str_end_date = date("Y-m-d H:i:s",strtotime("$to 23:59:59"));
        $knyga = DB::table('knyga')->where('isleidimo_data', '>=',$str_start_date)->
            where('isleidimo_data','<=',$str_end_date)->get();
        return view('reports', compact('knyga', 'tables'));*/
    }
}
