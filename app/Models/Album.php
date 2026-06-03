<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = [
        'nom',
        'date_parution',
        'id_artiste'
    ];

    public function artiste()
    {
        return $this->belongsTo(Artiste::class, 'id_artiste');
    }

    public function musiques()
    {
        return $this->hasMany(Musique::class, 'id_album');
    }
}
