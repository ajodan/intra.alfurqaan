<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Jamaah;
use App\Models\Transaksi;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekening';

    protected $fillable = [
        'no_rekening', 'saldo', 'pin', 'kd_jamaah',
    ];

    public function jamaah()
    {
        return $this->belongsTo(Jamaah::class, 'kd_jamaah');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'no_rekening');
    }
}
