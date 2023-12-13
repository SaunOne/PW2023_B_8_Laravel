<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    protected $table = 'LAUNDRY';
    protected $primaryKey = 'id_laundry';
    public $timestamps = false;

    protected $fillable = [
        'nama_laundry',
        'no_telp',
        'alamat',
    ];
}
