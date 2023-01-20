<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Jenisaset;

class Namaaset extends Model
{
    use HasFactory;

    protected $table = 'nama_asets';

    protected $fillable = [
        'id', 'jenisaset_id', 'kd_aset', 'nm_aset', 'merk',
    ];

    public function jenisaset()
    {
        return $this->belongsTo(Jenisaset::class);
    }

    
}
