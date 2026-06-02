<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs';
    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    protected $casts = [
        'mot_de_passe' => 'hashed',
    ];

    public function playlists()
    {
        return $this->hasMany(Playlist::class, 'id_utilisateur');
    }

    public function musiques()
    {
        return $this->belongsToMany(Musique::class, 'musique_utilisateur', 'id_utilisateur', 'id_musique');
    }
}
