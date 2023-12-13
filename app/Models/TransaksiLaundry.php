<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiLaundry extends Model
{
    protected $table = 'TRANSAKSI_LAUNDRY';
    protected $primaryKey = 'id_transaksi_laundry';
    public $timestamps = false;

    protected $fillable = [
        'id_layanan',
        'id_user',
        'id_jenis_pengambilan',
        'total_harga',
        'status_pengerjaan',
        'status_pembayaran',
        'tanggal_masuk',
        'tanggal_keluar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    public function jenis_pengambilan()
    {
        return $this->belongsTo(Layanan::class, 'jenis_pengambilan');
    }
}
