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
        'id', 'waktu', 'nominal_masuk', 'nominal_keluar', 'jenistransaksi_id','created_by',
    ];

    public function jenistransaksi()
    {
        return $this->belongsTo(Jenistransaksi::class);
    }
}
