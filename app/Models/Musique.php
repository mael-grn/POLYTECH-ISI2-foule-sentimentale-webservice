<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musique extends Model
{
    protected $table = 'musiques';

    protected $fillable = [
        'nom',
        'duree',
        'prix',
        'id_album',
    ];



    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album');
    }
    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class, 'musique_utilisateur', 'id_musique', 'id_utilisateur');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_musique', 'id_musique', 'id_genre');
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'musique_playlist', 'id_musique', 'id_playlist');
    }
}
