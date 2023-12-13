<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'LAYANAN';
    protected $primaryKey = 'id_layanan';
    public $timestamps = false;

    protected $fillable = [
        'nama_layanan',
        'durasi',
        'harga',
        'note',
    ];
}
