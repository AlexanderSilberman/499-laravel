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

/*
Route::get('/dvds/search', 'DVDController@search');
*/


//Route::get('/dvds', 'DVDController@listDVDs');


Route::get('/dvds/search', function(){
    $genres=Genre::all();
    $ratings=Rating::all();
    return View::make('dvds/search', ['genres'=>$genres, 'ratings'=>$ratings]);

});
Route::get('dvds/create', function()
{
    $genres = Genre::all();
    $ratings = Rating::all();
    $labels = Label::all();
    $sounds = Sound::all();
    $formats = Format::all();

    return View::make('dvds/create', [
        'ratings' => $ratings,
        'genres' => $genres,
        'labels' => $labels,
        'sounds' => $sounds,
        'formats' => $formats
    ]);
});

Route::post('dvds', function()
{
    $validation=DVD::validate(Input::all());

    if($validation->passes()){

        $dvd = new dvd();
        $dvd->title = Input::get('title');
        $dvd->rating_id = Input::get('rating');
        $dvd->genre_id = Input::get('genre');
        $dvd->label_id = Input::get('label');
        $dvd->sound_id = Input::get('sound');
        $dvd->format_id = Input::get('format');
        $dvd->save();

        return Redirect::to('dvds/create')
            ->with('success', 'Your insertion was completed successfully!');

    }

    return Redirect::to('dvds/create')
        ->withInput()
        ->with('errors', $validation->messages());
});

Route::get('dvds', function()
{
    $title=Input::get('dvd_title');
    $genre = Input::get('genre');
    $rating = Input::get('rating');

    $dvds = dvd::title($title)->genre_id($genre)->rating_id($rating)->take(30)->get();

    return View::make('dvds/dvd-list', ['dvds'=>$dvds]);

});




Route::get('/songs/search', 'SongController@search');
//Route::get('/songs', 'SongController@listSongs');

/*
Route::get('/', function(){
   return View::make('hello');
});
*/

Route::get('/', function()
{
    $restaurants=Restaurant::populate();
	return View::make('Yelp/display', ['restaurants'=>$restaurants]);
});


Route::get('restaurants/{id}/reviews', function($id)
{	
	$restaurants=Single::populateSingle($id);
	
	if($restaurants->facebook_page!=NULL){
		
		$fbpage = new \Yelp\Facebook\FacebookPage($restaurants->facebook_page);
		$fbpage = $fbpage->get();
	
	}
	else{
		$fbpage=NULL;
	}
	$reviews=Single::getReviews($id);
		
	return View::make('Yelp/reviews', ['reviews'=>$reviews, 'restaurants'=>$restaurants, 'facebook'=>$fbpage]);
	
});





Route::get('manga/search', function(){
   $mangas= new \ITP\API\MangaSearch();
    $json=$mangas->populate();

   // dd($json);

    return View::make('manga/search', ['mangas' => $json->manga]);

});

Route::get('manga/results', function(){
    $id=Input::get('chapterid');
    //dd($id);
    $mangas= new \ITP\API\MangaSearch();
    $json=$mangas->getResults($id);

     //dd($json);

    return View::make('manga/results', ['chapters' => $json->chapters, 'manga' => $json]);

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
$songs=Song::take(30)->get();

    foreach($songs as $song)
    {

        var_dump($song->artist->toArray());
    }

    dd($songs->toArray());

});

*/


?>