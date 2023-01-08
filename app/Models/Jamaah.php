<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Rekening;

class Jamaah extends Model
{
    use HasFactory;

    protected $table = 'jamaah';

    protected $fillable = [
        'kd_jamaah', 'nm_jamaah', 'jk', 'no_hp', 'email', 'alamat', 'id_users',
    ];

    public function rekening()
    {
        return $this->hasOne(Rekening::class, 'kd_jamaah');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
