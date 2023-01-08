<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jabatan extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';

    protected $table = 'jabatan';

    protected $fillable = [
        'id', 'nm_jabatan', 'created_at', 'updated_at',
    ];
}
