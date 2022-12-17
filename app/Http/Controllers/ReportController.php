<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }
    public function generate(Request $request)
    {
        if($request->report == 'gross')
        {
            $data['report'] = 'gross';
            $data['time'] = $request->time;
            
            if($request->time == 'today')
            {
                $data['dates'] = Sale::select('date')->whereDate('created_at', Carbon::today())->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'week')
            {
                $data['dates'] = Sale::select('date')->whereBetween('created_at',  [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'month')
            {
                $data['dates'] = Sale::select('date')->whereMonth('created_at',  Carbon::now()->month)->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'range')
            {
                $data['dates'] = Sale::select('date')->whereBetween('created_at',  [$request->start_date, $request->end_date])->groupBy('date')->orderBy('date','desc')->get();
            }
            // dd($data['dates']);
            return view('report.index',$data);
        }
    }
}
