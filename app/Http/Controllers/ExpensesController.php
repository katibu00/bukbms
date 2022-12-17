<?php

namespace App\Http\Controllers;

use App\Models\AssignDriver;
use App\Models\Expense;
use App\Models\ExpenseItem;
use App\Models\Route;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{

    public function index()
    {
        $data['allData'] = Expense::orderBy('created_at','desc')->get();
        return view('expenses.index',$data);
    }

    public function create()
    {
     
        $data['drivers'] = AssignDriver::all();
        $data['expenses'] = ExpenseItem::where('status',1)->get();
        return view('expenses.create',$data);
    }


    public function store(Request $request)
    {
        // return $request->all();
        $user_id = auth()->user()->id;
        $rowCount = count($request->driver_id);
        if($rowCount != NULL){
            for ($i=0; $i < $rowCount; $i++){
                $data = new Expense();
                $data->date = $request->date;
                $data->driver_id = $request->driver_id[$i];
                $data->item_id = $request->expense_id[$i];
                $data->cashier_id = $user_id;
                $data->amount = $request->amount[$i];
                $data->save();
            }
        }

        return response()->json([
            'status'=>201,
            'message'=>'Sales Recorded Successfully',
        ]);
    }
}
