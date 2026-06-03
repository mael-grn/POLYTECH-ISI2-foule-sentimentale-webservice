<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Utilisateur extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class, 'id_utilisateur');
    }

    public function musiques()
    {
        return $this->belongsToMany(Musique::class, 'musique_utilisateur', 'id_utilisateur', 'id_musique')
            ->withPivot('created_at', 'updated_at')
            ->withTimestamps();
    }
}
