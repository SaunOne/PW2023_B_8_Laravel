<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\TransaksiWallet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiWalletController extends Controller
{
    public function showAll()
    {
        $deposit = TransaksiWallet::all();

        return response([
            'message' => 'All Deposit Retrieved',
            'data' => $deposit
        ], 200);
    }

    public function showById($id)
    {
        $transaksiWallet = TransaksiWallet::where('id_transaksi_wallet' , $id);

        return response([
            'message' => 'Show Transaksi Wallet Successfully',
            'data' => $transaksiWallet
        ], 200);
    }

    public function showByTypeTransaksi($type)
    {
        $transaksiWallet = TransaksiWallet::where('id_type_transaksi' , $type);

        return response([
            'message' => 'Show Transaksi Wallet Successfully',
            'data' => $transaksiWallet
        ], 200);
    }

    public function showByIdUser($id)
    {
        $transaksiWallet = TransaksiWallet::where('id_user' , auth()->id())->get();

        return response([
            'message' => 'Show Transaksi Wallet Successfully',
            'data' => $transaksiWallet
        ], 200);
    }

    public function deposit(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'jumlah' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        $user = User::find(auth()->id());

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $data['tanggal'] = Carbon::now()->format('d-m-y');
        $data['status'] = 'success';
        $data['type_transaksi'] = 'Deposit';
        $data['id_user'] = auth()->id();
        $deposit = TransaksiWallet::create($data);
        $user['saldo']+=$deposit['jumlah'];
        $user->save();

        return response([
            'message' => 'Transaksi Success',
            'data' => $deposit,
            
        ], 200);
    }

    public function pembayaran(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'jumlah' => 'required',
        ]);

        $user = User::find(auth()->id());

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $data['tanggal'] = Carbon::now()->format('d-m-y');
        $data['status'] = 'success';
        $data['metode_pembayaran'] = 'Wallet';
        $data['type_transaksi'] = 'Pembayaran';
        $data['id_user'] = auth()->id();
        $bayar = TransaksiWallet::create($data);
        $user['saldo']-=$bayar['jumlah'];
        $user->save();

        return response([
            'message' => 'Transaksi Success',
            'data' => $bayar
        ], 200);
    }

}
