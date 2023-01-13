<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Jeniskegiatan;
use App\Models\Mubaligh;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';

    protected $fillable = [
        'id', 'jeniskegiatan_id', 'mubaligh_id', 'nm_kegiatan', 'photo', 'tgl', 'waktu', 'video_url', 'keterangan', 'created_by',
    ];

    public function jeniskegiatan()
    {
        return $this->belongsTo(Jeniskegiatan::class);
    }

    public function mubaligh()
    {
        return $this->belongsTo(Mubaligh::class);
    }
}
