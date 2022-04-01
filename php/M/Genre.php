<?php
require_once "Model.php";

class Genre extends Model
{
    function getAllGenres()
    {
        $sql = 'select g.GENRE_ID as id , g.GENRE_NAME as name from genre as g';
        return $this->executeRequest($sql);
    }

    function getGenreGames($id){
        $sql = ' SELECT gg.GENRE_ID as ggid ,gg.GAME_ID as gid,g.GAME_NAME as gn ,g.GAME_COVER_URL as gu FROM game_genre as gg join games as g on gg.GAME_ID=g.GAME_ID  where GENRE_ID = '.$id;
        return $this->executeRequest($sql);
    }

    function getGenreName($id){
        $sql = 'select g.GENRE_NAME as name from genre as g where g.GENRE_ID = '. $id;
        return $this->executeRequest($sql);
    }
}
