<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        $data['sales'] = Sale::whereDate('created_at', Carbon::today())->get();
        $data['expenses'] = Expense::whereDate('created_at', Carbon::today())->get();
        $data['weeks'] = Sale::whereBetween('created_at',  [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $data['months'] = Sale::whereMonth('created_at',  Carbon::now()->month)->get();
        return view('admin',$data);
    }
    public function agent()
    {
        return view('agent');
    }
}
