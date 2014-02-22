<?php
/**
 * Created by PhpStorm.
 * User: AlexSilberman
 * Date: 2/17/14
 * Time: 10:11 PM
 */

class DVD {
    public static function populategenre(){
        $query=DB::table('genres');
        $genres=$query->get();
        return $genres;

    }
    public static function populaterating(){
        $query=DB::table('ratings');
        $ratings=$query->get();
        return $ratings;

    }

    public static function search($dvd_title, $genre, $rating){

        $query = DB::table('dvds')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id');

        if($dvd_title){
            $query->where('title', 'LIKE', "%$dvd_title%");
        }

        if($genre!="ALL"){
            $query->where('dvds.genre_id', $genre);
        }

        if($rating!="ALL"){
            $query->where('dvds.rating_id', $rating);
        }


        $dvds = $query->get();

        return $dvds;
    }

}
