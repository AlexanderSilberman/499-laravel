<?php
/**
 * Created by PhpStorm.
 * User: AlexSilberman
 * Date: 2/18/14
 * Time: 5:46 PM
 */

class Genre extends Eloquent {
public function artist(){

    return $this->belongsTo('Artist');
}
public function genre()
{
 return $this->belongsTo('Genre');
}
}

}

?>