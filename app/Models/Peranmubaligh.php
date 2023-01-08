<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Models\Mubaligh;

class Peranmubaligh extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'id';

    protected $table = 'peran_mubalighs';

    protected $fillable = [
        'id', 'nm_peran', 'created_at', 'updated_at',
    ];

    public function mubaligh()
    {
        return $this->belongsTo(Mubaligh::class);
    }
}
