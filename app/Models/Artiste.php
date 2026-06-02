<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    protected $table = 'artistes';

    protected $fillable = [
        'nom'
    ];

    public function albums()
    {
        return $this->hasMany(Album::class, 'id_artiste');
    }
}
