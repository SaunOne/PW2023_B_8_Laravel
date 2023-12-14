<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\TransaksiTambahan;
use App\Models\TransaksiLaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiTambahanController extends Controller
{
    public function showByIdTransaksi($id_transaksi_laundry)
    {
        $transaksiTambahans = TransaksiTambahan::where('id_transaksi_laundry', $id_transaksi_laundry)->get();

        return response([
            'message' => 'Transaksi Tambahan Retrieved',
            'data' => $transaksiTambahans
        ], 200);
    }

    public function showById($id)
    {
        $transaksiTambahan = TransaksiTambahan::find($id);

        if (!$transaksiTambahan) {
            return response(['message' => 'Transaksi Tambahan not found'], 404);
        }

        return response([
            'message' => 'Show Transaksi Tambahan Successfully',
            'data' => $transaksiTambahan
        ], 200);
    }

    public function tambahItem(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'id_item' => 'required',
            'jumlah' => 'required',
            'id_transaksi_laundry' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $item = Item::find($data['id_item']);

        $data['total_harga'] = $item['harga'] * $data['jumlah'];

        $transaksiTambahan = TransaksiTambahan::create($data);

        $transaksi = TransaksiLaundry::find($data['id_transaksi_laundry']);

        if (!$transaksi) {
            return response(['message' => 'Transaksi Laundry not found'], 404);
        }

        $totalHarga = $transaksi['total_harga'] + TransaksiTambahan::where('id_transaksi_laundry', $data['id_transaksi_laundry'])->sum('total_harga');

        $transaksi['total_harga'] = $totalHarga;

        $transaksi->save();


        return response([
            'message' => 'Transaksi Tambahan created successfully',
            'data' => $transaksiTambahan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $transaksiTambahan = TransaksiTambahan::find($id);

        if (!$transaksiTambahan) {
            return response(['message' => 'Transaksi Tambahan not found'], 404);
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'id_item' => 'required',
            'jumlah' => 'required',
            'id_transaksi_laundry' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $transaksiTambahan->update($data);

        return response([
            'message' => 'Transaksi Tambahan updated successfully',
            'data' => $transaksiTambahan
        ], 200);
    }

    public function destroy($id)
    {
        $transaksiTambahan = TransaksiTambahan::find($id);

        if (!$transaksiTambahan) {
            return response(['message' => 'Transaksi Tambahan not found'], 404);
        }

        $transaksiTambahan->delete();

        return response(['message' => 'Transaksi Tambahan deleted successfully'], 200);
    }

}
