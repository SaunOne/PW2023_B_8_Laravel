<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function showAll()
    {
        $layanans = Layanan::all();

        return response([
            'message' => 'All Layanan Retrieved',
            'data' => $layanans
        ], 200);
    }

    public function showById($id)
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response(['message' => 'Layanan not found'], 404);
        }

        return response([
            'message' => 'Show Layanan Successfully',
            'data' => $layanan
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_layanan' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
            'note' => 'nullable',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $layanan = Layanan::create($data);

        return response([
            'message' => 'Layanan created successfully',
            'data' => $layanan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response(['message' => 'Layanan not found'], 404);
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_layanan' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
            'note' => 'nullable',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()->first()], 400);
        }

        $layanan->update($data);

        return response([
            'message' => 'Layanan updated successfully',
            'data' => $layanan
        ], 200);
    }

    public function destroy($id)
    {
        $layanan = Layanan::find($id);

        if (!$layanan) {
            return response(['message' => 'Layanan not found'], 404);
        }

        $layanan->delete();

        return response(['message' => 'Layanan deleted successfully'], 200);
    }

    
}
