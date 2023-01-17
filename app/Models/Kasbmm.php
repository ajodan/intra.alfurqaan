<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Jenistransaksibmm;

class Kasbmm extends Model
{
    use HasFactory;

    protected $table = 'kasbmm';

    protected $fillable = [
        'id', 'waktu', 'nominal_masuk', 'nominal_keluar', 'jenistransaksibmm_id','created_by',
    ];

    public function jenistransaksibmm()
    {
        return $this->belongsTo(Jenistransaksibmm::class);
    }
}
