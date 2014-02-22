<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@listDVDs');

Route::get('/songs/search', 'SongController@search');
//Route::get('/songs', 'SongController@listSongs');

Route::get('/', function(){
   return View::make('hello');
});
/*
Route::get('/songs/create', function()
{
    $genres = Genre::all();
    $artists = Artist::all();
    return View::make('songs/create', ['artists'=>$artists, 'genres'=>$genres]);

});

Route::post('songs',function(){
   $song = new Song();
    $song->title = Input::get('title');
    $song->artist_id=Input::get('artist');
    $song->genre_id = Input::get('genre');
    $song->price = Input::get('price');
    $song->save();

    return Redirect::to('songs/create')->with('success','Yay!');

});

Event::listen('illuminate.query', function($sql){

   echo "<div style='color: red;'>$sql</div>";
});

Route::get('songs', function()
{
$songs=Song::take(5)->get();

    foreach($songs as $song)
    {

        var_dump($song->artist->toArray());
    }

    dd($songs->toArray());

});

*/

?>