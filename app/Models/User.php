<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'id_wallet',
        'fullname',
        'username',
        'email',
        'password',
        'no_telp',
        'alamat',
        'type_pengguna',
        'image_profile',
    ];


    public function transactions()
    {
        return $this->hasMany(TransactionLaundry::class, 'id_user');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
