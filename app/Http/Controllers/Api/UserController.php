<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;





class UserController extends Controller
{
    public function index()
    {

        $user = User::all();
        if($user->count() > 0){

             return response()->json([
                'status' => 200,
                'user' => $user
            ], 200);
        }else{

             return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);

        }
        
    
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'password' => 'required|string|min:09',
        ]);

        if($validator->fails()){
        
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()

            ], 422);
        }else{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if($user){

                return response()->json([
                    'status' => 200,
                    'message' => "User Created Successfully"
                ], 200);
            }else{

                return response()->json([
                    'status' => 500,
                    'message' => "Something went Wrong!!!"
                ], 500);
            }    
        }
    } 

    public function show($id)
    {
        $user = User::find($id);
        if ($user){
            return response()->json([
                'status' => 200,
                'user' => $user
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => "No user Found!!!"
            ], 404);
        }
    }

    public function edit($id)
    
    {
        $user = User::find($id);
        if ($user){
            return response()->json([
                'status' => 200,
                'user' => $user
            ], 200);
        }else{

            return response()->json([
                'status' => 404,
                'message' => "No User Found!!!"
            ], 404);
        }  
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'password' => 'required|string|min:09',
        ]);

        if($validator->fails()){
        
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $user = User::find($id);
            if($user){

                $user->update([    
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "User update done"
                ], 200);
            }else{

                return response()->json([
                    'status' => 404,
                    'message' => "No record found"
                ], 404);
            }    
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user){

            $user ->delete();
            return response()->json([
                'status' => 200,
                'message' => "User delete successfully"
            ], 200);
         }else{

            return response()->json([
                'status' => 404,
                'message' => "No record found"
            ], 404);
        }
    }
}
