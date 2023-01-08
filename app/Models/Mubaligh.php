<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Peranmubaligh;


class Mubaligh extends Model
{
    use HasFactory;

    protected $table = 'mubalighs';

    protected $fillable = [
        'id', 'nm_lengkap', 'jk', 'hp', 'email', 'alamat', 'photo', 'profil', 'peranmubaligh_id'
    ];


    public function peranmubaligh()
    {
        return $this->belongsTo('App\Peranmubaligh', 'id');
    }
}
