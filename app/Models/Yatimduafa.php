<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yatimduafa extends Model
{
    use HasFactory;

    protected $table = 'yatim_duafas';

    protected $fillable = [
        'id', 'nm_lengkap', 'tgl_lhr', 'jk', 'status', 'alamat', 'hp', 'photo', 'keterangan', 'created_by'
    ];
}
