<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

    protected $fillable = [
        'user_id',
        'mapel',
        'deskripsi_tugas',
        'jumlah_halaman',
        'deadline',
        'image',
        'payment_method',
        'status'
    ];
}
