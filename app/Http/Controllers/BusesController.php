<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusesController extends Controller
{
    public function index()
    {
        $data['buses'] = Bus::orderBy('name')->get();
        return view('setup.buses.index',$data);
    }

    public function store(Request $request)
    {
        $classCount = count($request->name);
        if($classCount != NULL){
            for ($i=0; $i < $classCount; $i++){
                $data = new Bus();
                $data->name = $request->name[$i];
                $data->save();
            }
        }

        return response()->json([
            'status'=>200,
            'message'=>'Bus(s) Created Successfully',
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


    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required',
        ]);
       
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
      
        $data = Bus::findOrFail($request->id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->update();

        return response()->json([
            'status'=>200,
            'message'=>'Bus Updated Successfully',
        ]);
    }
}
