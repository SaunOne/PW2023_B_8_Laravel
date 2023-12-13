<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
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

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'jumlah_depost' => 'required',
            'metode_pembayaran' => 'required',
            'status' => 'required'
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $data['tanggal_deposit'] = Carbon::now()->format('d-m-y');

        $user = Deposit::create($data);

        return response([
            'message' => 'Register Success',
            'data' => $user
        ], 200);
    }

}
