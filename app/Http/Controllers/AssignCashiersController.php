<?php

namespace App\Http\Controllers;

use App\Models\AssignCashier;
use App\Models\Route;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AssignCashiersController extends Controller
{
    public function index()
    {
        $data['allData'] = AssignCashier::all();
        $data['cashiers'] = User::where('usertype','cashier')->get();
        $data['terminals'] = Route::where('status', 1)->get();
        return view('setup.assign_cashiers.index',$data);
    }

    public function edit($id)
    {
        $data['row'] = AssignCashier::find($id);
        $data['cashiers'] = User::where('usertype','cashier')->get();
        $data['terminals'] = Route::where('status', 1)->get();
        return view('setup.assign_cashiers.edit',$data);
    }

    public function update(Request $request, $id)
    {
     ;
        $data = AssignCashier::find($id);
        $data->cashier_id = $request->cashier;
        $data->terminal_id = $request->terminal;
        $data->update();

        Toastr::success('Cashier Updated Successfully');
        return redirect()->route('assign.cashiers.index');

    }
    public function store(Request $request)
    {
        $data = new AssignCashier();
        $data->cashier_id = $request->cashier;
        $data->terminal_id =  $request->terminal;
        $data->save();

        return response()->json([
            'status'=>200,
            'message'=>'Cashier Assigned Successfully',
        ]);
    }

    public function delete(Request $request){
        $data = AssignCashier::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'Bus Deleted Successfully'
            ]);
        };
    }
}
