<?php

namespace App\Http\Controllers;

use App\Models\AssignDriver;
use App\Models\Bus;
use App\Models\Route;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AssignDriversController extends Controller
{
    public function index()
    {
        $data['allData'] = AssignDriver::all();
        $data['drivers'] = User::where('usertype','driver')->get();
        $data['buses'] = Bus::where('status', 1)->get();
        $data['routes'] = Route::where('status', 1)->get();
        return view('setup.assign_drivers.index',$data);
    }

    public function edit($id)
    {
        $data['row'] = AssignDriver::find($id);
        $data['drivers'] = User::where('usertype','driver')->get();
        $data['buses'] = Bus::where('status', 1)->get();
        $data['routes'] = Route::where('status', 1)->get();
        return view('setup.assign_drivers.edit',$data);
    }

    public function update(Request $request, $id)
    {
     ;
        $data = AssignDriver::find($id);
        $data->driver_id = $request->driver;
        $data->bus_id = $request->bus;
        $data->terminal_id = implode(',', $request->routes);
        $data->update();

        Toastr::success('Driver Updated Successfully');
        return redirect()->route('assign.drivers.index');

    }
    public function store(Request $request)
    {
        $data = new AssignDriver();
        $data->driver_id = $request->driver;
        $data->bus_id = $request->bus;
        $data->terminal_id = implode(',', $request->routes);
        $data->save();

        return response()->json([
            'status'=>200,
            'message'=>'Driver Assigned Successfully',
        ]);
    }

    public function delete(Request $request){
        $data = Bus::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'Bus Deleted Successfully'
            ]);
        };
    }

}
