<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        return view('users.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email',
            'phone1' => 'required|min:9|numeric|unique:users,phone1',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'errors' => $validator->messages(),
            ]);
        } else {

            $user = new User();
            $user->name = $request->name;
            $user->status = 1;
            $user->usertype = $request->role;
            $user->phone1 = $request->phone1;
            $user->phone2 = $request->phone2;
            $user->email = $request->email;
            $user->password = Hash::make(123);
            $user->save();

            return response()->json([
                'status' => 201,
                'message' => 'User Registered Successfully',
            ]);

        }
    }

    public function getDetails(Request $request)
    {
        $user = User::find($request->id);

        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }
    public function verify(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        
        if($user->status == 0)
        {
            $user->status = 1;
            $user->update();

            return response()->json([
                'status' => 200,
                'message' => 'User Activation was sucessfully',
            ]);
           
        }
        if($user->status == 1)
        {
            $user->status = 0;
            $user->update();

            return response()->json([
                'status' => 200,
                'message' => 'User Deactivation was sucessfully',
            ]);
        }
       
    }

    public function sort(Request $request)
    {
   
          if($request->role == 'all')
          {
            $data['users'] = User::all();
          }else
          {
            $data['users'] = User::where('usertype',$request->role)->get();
          }
        
          if( $data['users']->count() > 0)
          {
              return view('users.table', $data)->render();
          }else
          {
              return response()->json([
                  'status' => 404,
              ]);
          }
    }
}
