<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Kategori;

//use Cviebrock\EloquentSluggable\Sluggable;

class Artikel extends Model
{
    use HasFactory;
    //use Sluggable;

    protected $table = 'artikels';

    protected $fillable = [
        'id', 'kategori_id', 'slug', 'judul', 'isi_artikel', 'status', 'photo', 'created_by',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
