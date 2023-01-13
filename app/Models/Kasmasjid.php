<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Jenistransaksi;

class Kasmasjid extends Model
{
    use HasFactory;

    protected $table = 'kasmasjid';

    protected $fillable = [
        'id', 'waktu', 'nominal', 'jenistransaksi_id',
    ];

    public function jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class);
    }
}
