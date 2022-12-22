<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function index()
    {
        $data['terminals'] = Route::where('status',1)->get();
        $data['drivers'] = User::where('usertype','driver')->where('status',1)->get();
        return view('report.index',$data);
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
            $data['terminals'] = Route::where('status',1)->get();
            $data['drivers'] = User::where('usertype','driver')->where('status',1)->get();
            return view('report.index',$data);
        }

        if($request->report == 'terminal')
        {
            $data['report'] = 'terminal';
            $data['time'] = $request->time;
            $data['terminal_id'] = $request->terminal_id;
            
            if($request->time == 'today')
            {
                $data['dates'] = Sale::select('date')->where('terminal_id',$request->terminal_id)->whereDate('created_at', Carbon::today())->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'week')
            {
                $data['dates'] = Sale::select('date')->where('terminal_id',$request->terminal_id)->whereBetween('created_at',  [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'month')
            {
                $data['dates'] = Sale::select('date')->where('terminal_id',$request->terminal_id)->whereMonth('created_at',  Carbon::now()->month)->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'range')
            {
                $data['dates'] = Sale::select('date')->where('terminal_id',$request->terminal_id)->whereBetween('created_at',  [$request->start_date, $request->end_date])->groupBy('date')->orderBy('date','desc')->get();
            }
            $data['terminals'] = Route::where('status',1)->get();
            $data['drivers'] = User::where('usertype','driver')->where('status',1)->get();
            return view('report.index',$data);
        }

        if($request->report == 'driver')
        {
            $data['report'] = 'driver';
            $data['time'] = $request->time;
            $data['driver_id'] = $request->driver_id;
            
            if($request->time == 'today')
            {
                $data['dates'] = Sale::select('date')->where('driver_id',$request->driver_id)->whereDate('created_at', Carbon::today())->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'week')
            {
                $data['dates'] = Sale::select('date')->where('driver_id',$request->driver_id)->whereBetween('created_at',  [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'month')
            {
                $data['dates'] = Sale::select('date')->where('driver_id',$request->driver_id)->whereMonth('created_at',  Carbon::now()->month)->groupBy('date')->orderBy('date','desc')->get();
            }
            if($request->time == 'range')
            {
                $data['dates'] = Sale::select('date')->where('driver_id',$request->driver_id)->whereBetween('created_at',  [$request->start_date, $request->end_date])->groupBy('date')->orderBy('date','desc')->get();
            }
            $data['terminals'] = Route::where('status',1)->get();
            $data['drivers'] = User::where('usertype','driver')->where('status',1)->get();
            return view('report.index',$data);
        }
        if($request->report == 'summary')
        {
            $data['report'] = 'summary';
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
            $data['terminals'] = Route::where('status',1)->get();
            $data['drivers'] = User::where('usertype','driver')->where('status',1)->get();
            return view('report.index',$data);
        }
    }
}
