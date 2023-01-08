<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $table = 'pengurus';

    protected $fillable = [
        'kd_pengurus', 'nm_pengurus', 'jk', 'no_hp', 'email', 'alamat', 'id_jabatan', 'id_users',
    ];
}
