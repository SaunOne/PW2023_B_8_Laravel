<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiTambahan extends Model
{
    protected $table = 'TRANSAKSI_TAMBAHAN';
    protected $primaryKey = 'id_transaksi_tambahan';
    public $timestamps = false;

    protected $fillable = [
        'id_item',
        'jumlah',
        'id_transaksi_laundry',
    ];
}
