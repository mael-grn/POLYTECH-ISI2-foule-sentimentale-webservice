# Schéma relationnel de la base de données

```
utilisateur (id_utilisateur, nom, prenom, email, mot_de_passe)
clé primaire : id_utilisateur
clés étrangères : aucune

playlist (id_playlist, nom, #id_utilisateur)
clé primaire : id_playlist
clés étrangères : id_utilisateur (reference id de utilisateur)

genre (id_genre, nom)
clé primaire : id_genre
clés étrangères : aucune

artiste (id_artiste, nom)
clé primaire : id_artiste
clés étrangères : aucune

album (id_album, nom, date_parution, #id_artiste)
clé primaire : id_album
clés étrangères : id_artiste (reference id de artiste)

musique (id_musique, nom, duree, prix, #id_album)
clé primaire : id_musique
clés étrangères : id_album (reference id de album)

musique_genre (id_musique, id_genre)
clé primaire : (id_musique, id_genre)
clés étrangères : id_musique (reference id de musique), id_genre (reference id de genre)

playlist_musique (id_playlist, id_musique)
clé primaire : (id_playlist, id_musique)
clés étrangères : id_playlist (reference id de playlist), id_musique (reference id de musique)

utilisateur_musique (id_utilisateur, id_musique, prix_achat, date_achat)
clé primaire : (id_utilisateur, id_musique)
clés étrangères : id_utilisateur (reference id de utilisateur), id_musique (reference id de musique)
```
