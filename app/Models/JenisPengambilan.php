<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengambilan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pengambilan';
    protected $primaryKey = 'id_jenis_pengambilan';
    public $timestamps = false;

    protected $fillable = [
        'nama_jenis_pengambilan',
        'harga',
    ];
}
