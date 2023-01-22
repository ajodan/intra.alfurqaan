<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Kategori;

//use Cviebrock\EloquentSluggable\Sluggable;

class Jadwaljumat extends Model
{
    use HasFactory;
    //use Sluggable;

    protected $table = 'jadwal_jumat';

    protected $fillable = [
        'id', 'tgl', 'waktu', 'imam', 'khotib', 'mc', 'muadzin', 'created_by',
    ];

   
}
