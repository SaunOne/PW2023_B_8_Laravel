<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiWallet extends Model
{
    protected $table = 'Transaksi_Wallet';
    protected $primaryKey = 'id_transaksi_wallet';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'type_teransaksi',
        'jumlah',
        'metode_pembayaran',
        'status',
        'tanggal',
    ];
}
