<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showAll()
    {
        $users = User::all();

        return response([
            'message' => 'All Users Retrieved',
            'data' => $users
        ], 200);
    }

    public function showById($id)
    {
        $user = User::find($id);

        return response([
            'message' => 'Show User Successfully',
            'data' => $user
        ], 200);
    }

    public function showByLogin()
    {   
        response([
            'message' => auth()->id(),
        ]);
        $user = User::find(auth()->id());

        return response([
            'message' => 'Show User Successfully',
            'data' => $user
        ], 200);
    }

    public function updateProfile(Request $request){

        $data = $request->all();

        $user = User::find(auth()->id());

        if($user == null){
            return response([
                'message' => 'User Not Found',
            ], 400);
        }
        $temp = $user['email'];
        $user['email'] = '';
        $user->save();

        $validate = Validator::make($data, [
            'email' => 'required|email:rfc,dns|unique:users',
        ]);


        if ($validate->fails()) {
            $user['email'] = $temp;
            $user->save();
            return response(['message' => $validate->errors()->first()], 400);
        }
    
        

        $user->update($data);

        return response([
            'message' => 'Update Profile Success',
            'data' => $user
        ], 200);
    }

    public function destroy($id){
        $user = User::find($id);

        if($user == null){
            return response([
                'message' => 'User Not Found',
            ], 400);
        }

        $user->delete();

        return response([
            'message' => 'Delete User Successfully',
        ], 200);
    }



}
 