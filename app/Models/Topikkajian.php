<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Topikkajian extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';

    protected $table = 'topik_kajians';

    protected $fillable = [
        'id', 'nm_topik_kajian', 'created_at', 'updated_at',
    ];
}
