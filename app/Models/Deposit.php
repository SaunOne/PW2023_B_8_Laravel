<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'DEPOSIT';
    protected $primaryKey = 'id_deposit';
    public $timestamps = false;

    protected $fillable = [
        'jumlah_deposit',
        'metode_pembayaran',
        'status',
        'tanggal_deposit',
    ];
}
