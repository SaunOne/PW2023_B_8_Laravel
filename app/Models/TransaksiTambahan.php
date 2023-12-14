<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTambahan extends Model
{
    protected $table = 'transaksi_tambahan';
    protected $primaryKey = 'id_transaksi_tambahan';
    public $timestamps = false;

    protected $fillable = [
        'id_item',
        'jumlah',
        'id_transaksi_laundry',
        'total_harga'
    ];


    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item');
    }

    public function transaksi_laundry()
    {
        return $this->belongsTo(TransaksiLaundry::class, 'id_transaksi_laundry');
    }
}
