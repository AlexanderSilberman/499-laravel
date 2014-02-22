<?php
/**
 * Created by PhpStorm.
 * User: AlexSilberman
 * Date: 2/17/14
 * Time: 10:12 PM
 */

class DVDController extends BaseController{
    public function search(){
        $genres = DVD::populategenre();
        $ratings = DVD::populaterating();
        return View::make('dvds/search', ['genres'=>$genres, 'ratings'=>$ratings]);
    }
    public function listDVDs()
    {
        $dvd_title= Input::get('dvd_title'); // $_GET['song_title']
        $genre = Input::get('genre');
        $rating = Input::get('rating');

        $dvds = DVD::search($dvd_title, $genre, $rating);
        //dd($songs);

        return View::make('dvds/dvd-list', ['dvds'=>$dvds]);

    }


}