<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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

        $user = User::find(auth()->id());

        return response([
            'message' => 'Show User Successfully',
            'data' => $user
        ], 200);
    }

    public function updateProfile(Request $request)
    {

        $data = $request->all();
        

        $user = User::find(auth()->id());

        if ($user == null) {
            return response([
                'message' => 'User Not Found',
            ], 400);
        }
        $temp = $user['email'];
        $user['email'] = '';
        $user->save();

        $validate = Validator::make($data, [
            'email' => 'nullable|email:rfc,dns|unique:users,email',
        ]);


        if ($validate->fails()) {
            $user['email'] = $temp;
            $user->save();
            return response(['message' => $validate->errors()->first()], 400);
        }


        if($request->hasFile('image_profile')){
            // kalau kalian membaca ini, ketahuilah bahwa gambar tidak akan bisa diupdate karena menggunakan method PUT ;)
            // kalian bisa mengubahnya menjadi POST atau PATCH untuk mengupdate gambar
            $uploadFolder = 'users';
            $image = $request->file('image_profile');
            $image_uploaded_path = $image->store($uploadFolder, 'public');
            $uploadedImageResponse = basename($image_uploaded_path);

            // hapus data thumbnail yang lama dari storage
            Storage::disk('public')->delete('users/'.$user->image_profile);

            // set thumbnail yang baru
            $data['image_profile'] = $uploadedImageResponse;
            // return response([
            //     'message' => $image_uploaded_path,
            // ]);
        }

        $data2 = json_encode($request->all());

        $user->update($data);

        return response([
            'message' => 'Update Profile Success',
            'data' => $user,
            'data2' => $data2
        ], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user == null) {
            return response([
                'message' => 'User Not Found',
            ], 400);
        }

        $user->delete();

        return response([
            'message' => 'Delete User Successfully',
        ], 200);
    }

    public function tempCreate(Request $request, $id)
    {
        $user = User::find($id);


        $uploadFolder = 'users';
        $image = $request->file('image_profile');
        $image_uploaded_path = $image->store($uploadFolder, 'public');
        $uploadedImageResponse = basename($image_uploaded_path);

        $user['image_profile'] = $uploadedImageResponse;

        $user->save();

        return response([
            'message' => $user
        ]);
    }
}
