<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';

    protected $fillable = [
        'nom',
        'id_utilisateur',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    public function musiques()
    {
        return $this->belongsToMany(Musique::class, 'musique_playlist', 'id_playlist', 'id_musique')
            ->withPivot('created_at', 'updated_at')
            ->withTimestamps();
    }

}
