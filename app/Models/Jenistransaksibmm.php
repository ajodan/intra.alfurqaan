<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jenistransaksibmm extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';

    protected $table = 'jenis_transaksi_bmm';

    protected $fillable = [
        'id', 'nm_jenis_transaksi', 'tipe_transaksi', 'created_at', 'updated_at',
    ];
}
