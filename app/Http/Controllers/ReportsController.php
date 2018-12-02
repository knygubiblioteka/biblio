<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    //


    public function showtable(Request $request)
    {
        $tables = ['populiariausia', 'ivertintos', 'zymos', 'padaliniai','zanras','metai'];
        $from = $request->input('from');
        $to = $request->input('to');
        $str_start_date = date("Y-m-d H:i:s",strtotime("$from 00:00:00"));
        $str_end_date = date("Y-m-d H:i:s",strtotime("$to 23:59:59"));
        $knyga = DB::table('knyga')->where('isleidimo_data', '>=',$str_start_date)->
            where('isleidimo_data','<=',$str_end_date)->get();
        return view('reports', compact('knyga', 'tables'));
    }
}
