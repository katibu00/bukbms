<?php

namespace App\Http\Controllers;

use App\Models\AssignDriver;
use App\Models\Route;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $data['allData'] = Sale::orderBy('created_at','desc')->get();
        return view('sales.index',$data);
    }
    public function create()
    {
     
        $data['drivers'] = AssignDriver::all();
        $data['terminals'] = Route::where('status',1)->get();
        return view('sales.create',$data);
    }


    public function store(Request $request)
    {
        // return $request->all();
        $user_id = auth()->user()->id;
        $rowCount = count($request->driver_id);
        if($rowCount != NULL){
            for ($i=0; $i < $rowCount; $i++){
                $data = new Sale();
                $data->date = $request->date;
                $data->driver_id = $request->driver_id[$i];
                $data->terminal_id = $request->route_id[$i];
                $data->cashier_id = $user_id;
                $data->tickets = $request->tickets[$i];
                $price = Route::where('id',$request->route_id[$i])->first()->price;
                $data->price = $price;
                $data->save();
            }
        }

        return response()->json([
            'status'=>201,
            'message'=>'Sales Recorded Successfully',
        ]);
    }

}
