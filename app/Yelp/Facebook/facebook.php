<?php
namespace Yelp\Facebook;

class FacebookPage {
	protected $id;
	public function __construct($id){
		$this->id=$id;
	}
	
	
	public function get(){
		$endpoint='http://graph.facebook.com/'. $this->id;
		$json=file_get_contents($endpoint);
		return json_decode($json);
	}
}


?>