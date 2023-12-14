<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepositController extends Controller
{
    public function showAll()
    {
        $deposit = Deposit::all();

        return response([
            'message' => 'All Deposit Retrieved',
            'data' => $deposit
        ], 200);
    }

    public function showById($id)
    {
        $deposit = Deposit::where('id_deposit' , $id);

        return response([
            'message' => 'Show Deposit Successfully',
            'data' => $deposit
        ], 200);
    }

    public function showByIdUser($id)
    {
        $deposit = Deposit::where('id_user' , auth()->id())->get();

        return response([
            'message' => 'Show Deposit Successfully',
            'data' => $deposit
        ], 200);
    }

    public function deposit(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'jumlah_deposit' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        $user = User::find(auth()->id());

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $data['tanggal_deposit'] = Carbon::now()->format('d-m-y');
        $data['status'] = 'success';
        $deposit = Deposit::create($data);
        $user['saldo']+=$deposit['jumlah_deposit'];
        $user->save();

        return response([
            'message' => 'Register Success',
            'data' => $deposit
        ], 200);
    }

}
