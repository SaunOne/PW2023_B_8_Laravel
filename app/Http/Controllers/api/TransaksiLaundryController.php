<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JenisPengambilan;
use App\Models\Layanan;
use App\Models\TransaksiLaundry;
use App\Models\TransaksiTambahan;
use App\Models\User;
use Carbon\Carbon;
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

    public function showByIdUser()
    {
     
        $transaksis = TransaksiLaundry::join('layanan', 'transaksi_laundry.id_layanan', '=', 'layanan.id_layanan')
    ->where('transaksi_laundry.id_user', auth()->id())
    ->get();


        return response([
            'message' => 'Show Transaksi Laundry Successfully',
            'data' => $transaksis
        ], 200);
    }

    public function order(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'id_layanan' => 'required',
            'id_jenis_pengambilan' => 'required',
            
            'berat' => 'required',
            
        ]);
        $data['id_user'] = auth()->id();
        $layanan = Layanan::find($data['id_layanan']);


        $data['tanggal_masuk'] = Carbon::now()->format('y,m,d');
        $data['tanggal_keluar'] = Carbon::now()->addDays($layanan['durasi'])->format('y,m,d');
        $data['status_pengerjaan'] = 'Proses';
        $data['status_pembayaran'] = 'Belum Lunas';


        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }
        $jenisPengambilan = JenisPengambilan::find($data['id_jenis_pengambilan']);
        $totalHarga = $data['berat'] * $layanan['harga'];
        $data['total_harga'] = $totalHarga + $jenisPengambilan['harga'];

        $transaksi = TransaksiLaundry::create($data);

        return response([
            'message' => 'Transaksi Laundry created successfully',
            'data' => $transaksi
        ], 200);
    }

    public function updateTotalHarga($id){
        $transaksi = TransaksiLaundry::find($id);

        if (!$transaksi) {
            return response(['message' => 'Transaksi Laundry not found'], 404);
        }

        $totalHarga = $transaksi['total_harga'] + TransaksiTambahan::where('id_transaksi_laundry', $id)->sum('total_harga');

        $transaksi['total_harga'] = $totalHarga;

        $transaksi->save();

        return response([
            'message' => 'Total Harga Berhasil Di Update',
            'data' => $transaksi
        ], 200); 
    }

    public function bayar(Request $request,$id)
    {
        
        $user = User::find(auth()->id());

        $transaksi = TransaksiLaundry::find($id);
        $request;
        if (!$transaksi) {
            return response(['message' => 'Transaksi Laundry not found'], 404);
        }

        if($user['saldo'] < $transaksi['total_harga']){
            return response([
                'message' => 'Saldo Anda Tidak Cukup',
                'data' => $transaksi
            ], 200);
        }

        
        

        $transaksi['status_pembayaran'] = 'Lunas';
        $user['saldo'] = $user['saldo'] - $transaksi['total_harga'];

        $user->save();
        $transaksi->save();

        return response([
            'message' => 'Transaksi Laundry updated successfully',
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
