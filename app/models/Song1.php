<?php
/**
 * Created by PhpStorm.
 * User: AlexSilberman
 * Date: 2/18/14
 * Time: 6:11 PM
 */

class Song1 extends Eloquent {
    public function artist(){
       return $this->belongTo('Artist');
    }

}

?>