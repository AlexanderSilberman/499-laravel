<?php

class Single extends Eloquent {
	public static function populateSingle($id){
		$query=DB::table('restaurants');
		$restaurant=Restaurant::find($id);
		return $restaurant;
	}
	
	public static function getReviews($id){
		$query=DB::table('reviews');
		$query->where('restaurant_id', $id);
		$reviews=$query->get();
		return $reviews;
	}
	

}

?>