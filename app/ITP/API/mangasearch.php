<?php
/**
 * Created by PhpStorm.
 * User: AlexSilberman
 * Date: 3/5/14
 * Time: 2:49 AM
 */

namespace ITP\API;

class MangaSearch {

    public function populate(){
        $endpoint= "https://www.mangaeden.com/api/list/0/?p=0";
        $json = file_get_contents($endpoint);
        return json_decode($json);
    }

    public function getResults($id){
        $endpoint ="https://www.mangaeden.com/api/manga/".$id;
        $json = file_get_contents($endpoint);
        return json_decode($json);

    }

}