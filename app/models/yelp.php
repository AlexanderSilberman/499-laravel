<?php
/**
 * Created by PhpStorm.
 * User: AlexSilberman
 * Date: 3/11/14
 * Time: 6:13 PM
 */

class Restaurant extends Eloquent {
    public static function populate(){
        $query=DB::table('restaurants');
        $restaurants=$query->get();
        return $restaurants;

    }
	
	public static function getReivews($id){
		$query=DB::table('reviews');
		$query->where('id', $id);
		$reviews=$query->get();
		return $reviews;
	}

}


?>