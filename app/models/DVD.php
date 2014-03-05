<?php
/**
 * Created by PhpStorm.
 * User: AlexSilberman
 * Date: 2/17/14
 * Time: 10:11 PM
 */

class dvd extends Eloquent {
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


    public function scopeTitle($query, $title)
    {
     return $query->where('title', 'LIKE', "%$title%");
    }
    public function scopeRating_id($query, $rating)
    {
        if($rating=="ALL"){
            return $query;
        }
        return $query->whereRating_id($rating);
    }
    public function scopeGenre_id($query, $genre)
    {
        if($genre=="ALL"){
            return $query;
        }
        return $query->whereGenre_id($genre);
    }



    public static function validate($input){
        return Validator::make($input, [
            'label' => 'required|integer',
            'format' => 'required|integer',
            'genre' => 'required|integer',
            'sound' => 'required|integer',
            'rating' => 'required|integer',
            'title' => 'min:3|alpha_num'
        ]);
    }






    public function genre()
    {
        return $this->belongsTo('genre');
    }

    public function format()
    {
        return $this->belongsTo('format');
    }

    public function sound()
    {
        return $this->belongsTo('sound');
    }

    public function rating()
    {
        return $this->belongsTo('rating');
    }

    public function label()
    {
        return $this->belongsTo('label');
    }





}
