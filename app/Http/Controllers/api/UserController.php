<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users = User::where('id_user' , $id);

        return response([
            'message' => 'Show User Successfully',
            'data' => $users
        ], 200);
    }

    public function updateProfile(Request $request){
        $user = User::find(auth()->id());

        if($user == null){
            return response([
                'message' => 'User Not Found',
            ], 400);
        }

        $user['username' ] = $request->username;
        $user['fullname' ] = $request->fullname;
        $user['email'] = $request->email;
        $user['password'] = $request->getPassword;
        $user['no_telp'] = $request->no_telp;
        $user['alamat'] = $request->alamat;
        $user['type_pengguna'] = $request->type_pengguna;
        $user['image_profile'] = $request->image_profile;
        
        $user->save();

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
            'data' => $user
        ], 200);
    }



}
 