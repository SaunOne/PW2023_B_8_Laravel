<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiLaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiLaundryController extends Controller
{
    public function showAll()
    {
        $transaksis = TransaksiLaundry::all();

        return response([
            'message' => 'All Transaksi Laundry Retrieved',
            'data' => $transaksis
        ], 200);
    }

    public function showById($id)
    {
        $transaksi = TransaksiLaundry::find($id);

        if (!$transaksi) {
            return response(['message' => 'Transaksi Laundry not found'], 404);
        }

        return response([
            'message' => 'Show Transaksi Laundry Successfully',
            'data' => $transaksi
        ], 200);
    }

    public function showByIdUser($id)
    {
        $transaksis = TransaksiLaundry::where('id_user', $id)->get();

        return response([
            'message' => 'Show Transaksi Laundry Successfully',
            'data' => $transaksis
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'id_layanan' => 'required',
            'id_user' => 'required',
            'id_jenis_pengambilan' => 'required',
            'total_harga' => 'required',
            'status_pengerjaan' => 'required',
            'status_pembayaran' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'nullable',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $transaksi = TransaksiLaundry::create($data);

        return response([
            'message' => 'Transaksi Laundry created successfully',
            'data' => $transaksi
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $transaksi = TransaksiLaundry::find($id);

        if (!$transaksi) {
            return response(['message' => 'Transaksi Laundry not found'], 404);
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'id_layanan' => 'required',
            'id_user' => 'required',
            'id_jenis_pengambilan' => 'required',
            'total_harga' => 'required',
            'status_pengerjaan' => 'required',
            'status_pembayaran' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'nullable',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $transaksi->update($data);

        return response([
            'message' => 'Transaksi Laundry updated successfully',
            'data' => $transaksi
        ], 200);
    }

    public function destroy($id)
    {
        $transaksi = TransaksiLaundry::find($id);

        if (!$transaksi) {
            return response(['message' => 'Transaksi Laundry not found'], 404);
        }

        $transaksi->delete();

        return response(['message' => 'Transaksi Laundry deleted successfully'], 200);
    }
}
