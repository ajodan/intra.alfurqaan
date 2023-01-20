<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Namaaset;

//use Cviebrock\EloquentSluggable\Sluggable;

class Aset extends Model
{
    use HasFactory;
    //use Sluggable;

    protected $table = 'asets';

    protected $fillable = [
        'id', 'namaaset_id', 'jumlah', 'satuan', 'tgl_perolehan', 'harga_perolehan', 'kondisi', 'photo',
    ];

    public function namaaset()
    {
        return $this->belongsTo(Namaaset::class);
    }

    
}
