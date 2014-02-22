<?php

class Song {
	public static function search($song_title, $artist){

	$query = DB::table('songs')
	->join('artists', 'artists.id', '=', 'songs.artist_id')
	->join('genres', 'songs.genre_id', '=', 'genres.id');

	if($song_title){
		$query->where('title', 'LIKE', "%$song_title%");
	}

	if($artist){
		$query->where('artist_name', 'LIKE', "%$artist%");
	}


	$songs = $query->get();
	
	return $songs;
	}

}
