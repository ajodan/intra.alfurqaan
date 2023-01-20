<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jenisaset extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';

    protected $table = 'jenis_asets';

    protected $fillable = [
        'id', 'nm_jenis_aset', 'created_at', 'updated_at',
    ];
}
