<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kajian extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';

    protected $table = 'kajians';

    protected $fillable = [
        'id', 'topikkajian_id', 'kegiatan_id', 'isi_kajian', 'video_kajian', 'created_by', 'created_at', 'updated_at',
    ];
}
