<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'Transaksi_Wallet';
    protected $primaryKey = 'id_deposit';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        
        'jumlah_deposit',
        'metode_pembayaran',
        'status',
        'tanggal_deposit',
    ];
}
