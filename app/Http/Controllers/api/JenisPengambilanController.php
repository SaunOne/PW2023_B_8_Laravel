<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\JenisPengambilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisPengambilanController extends Controller
{
    public function showAll()
    {
        $jenisPengambilans = JenisPengambilan::all();

        return response([
            'message' => 'All Jenis Pengambilan Retrieved',
            'data' => $jenisPengambilans
        ], 200);
    }

    public function showById($id)
    {
        $jenisPengambilan = JenisPengambilan::find($id);

        if (!$jenisPengambilan) {
            return response(['message' => 'Jenis Pengambilan not found'], 404);
        }

        return response([
            'message' => 'Show Jenis Pengambilan Successfully',
            'data' => $jenisPengambilan
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_jenis_pengambilan' => 'required',
            'harga' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $jenisPengambilan = JenisPengambilan::create($data);

        return response([
            'message' => 'Jenis Pengambilan created successfully',
            'data' => $jenisPengambilan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $jenisPengambilan = JenisPengambilan::find($id);

        if (!$jenisPengambilan) {
            return response(['message' => 'Jenis Pengambilan not found'], 404);
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_jenis_pengambilan' => 'required',
            'harga' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $jenisPengambilan->update($data);

        return response([
            'message' => 'Jenis Pengambilan updated successfully',
            'data' => $jenisPengambilan
        ], 200);
    }

    public function destroy($id)
    {
        $jenisPengambilan = JenisPengambilan::find($id);

        if (!$jenisPengambilan) {
            return response(['message' => 'Jenis Pengambilan not found'], 404);
        }

        $jenisPengambilan->delete();

        return response(['message' => 'Jenis Pengambilan deleted successfully'], 200);
    }
}
