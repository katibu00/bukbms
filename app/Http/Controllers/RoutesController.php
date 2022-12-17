<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoutesController extends Controller
{
    public function index()
    {
        $data['routes'] = Route::orderBy('name')->get();
        return view('setup.routes.index',$data);
    }

    public function store(Request $request)
    {
        $classCount = count($request->name);
        if($classCount != NULL){
            for ($i=0; $i < $classCount; $i++){
                $data = new Route();
                $data->name = $request->name[$i];
                $data->price = $request->price[$i];
                $data->save();
            }
        }

        return response()->json([
            'status'=>200,
            'message'=>'Terminal(s) Created Successfully',
        ]);
    }

    public function delete(Request $request){
        $data = Route::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'Terminal Deleted Successfully'
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
      
        $data = Route::findOrFail($request->id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->status = $request->status;
        $data->update();

        return response()->json([
            'status'=>200,
            'message'=>'Terminal Updated Successfully',
        ]);
    }
}
