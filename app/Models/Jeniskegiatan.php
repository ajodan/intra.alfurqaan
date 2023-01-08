<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jeniskegiatan extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';

    protected $table = 'jenis_kegiatans';

    protected $fillable = [
        'id', 'nm_jenis_kegiatan', 'created_at', 'updated_at',
    ];
}
