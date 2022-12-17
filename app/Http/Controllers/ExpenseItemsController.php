<?php

namespace App\Http\Controllers;

use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseItemsController extends Controller
{
    public function index()
    {
        $data['expenses'] = ExpenseItem::orderBy('name')->get();
        return view('setup.expense.index',$data);
    }

    public function store(Request $request)
    {
        $classCount = count($request->name);
        if($classCount != NULL){
            for ($i=0; $i < $classCount; $i++){
                $data = new ExpenseItem();
                $data->name = $request->name[$i];
                $data->save();
            }
        }

        return response()->json([
            'status'=>200,
            'message'=>'Expense Item(s) Created Successfully',
        ]);
    }

    public function delete(Request $request){
        $data = ExpenseItem::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'Expense Item Deleted Successfully'
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
      
        $data = ExpenseItem::findOrFail($request->id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->update();

        return response()->json([
            'status'=>200,
            'message'=>'Expense Item Updated Successfully',
        ]);
    }
}
