<?php
require_once "Model.php";

class Game extends Model
{
    function getAllGames()
    {
        $sql = 'select GAME_ID as id, GAME_COVER_URL as cover,GAME_SUMMARY as summary,'
            . ' GAME_NAME as title, GAME_STORYLINE as storyline from games order by title ASC';
        return $this->executeRequest($sql);
    }

    function getRandomGamesHighScore()
    {
        $sql = 'select GAME_ID as id, GAME_COVER_URL as cover,'
            . ' GAME_NAME as title, GAME_SUMMARY as summary from games where GAME_AGGREGATED_RATING > 50 order by RAND() limit 30';
        return $this->executeRequest($sql);
    }

    function getGame($id)
    {
        $sql = 'select GAME_ID as id, GAME_COVER_URL as cover,'
            . ' GAME_NAME as title, GAME_SUMMARY as summary from games'
            . ' where GAME_ID =' . $id;
        return $this->executeRequest($sql);
    }

    function getSimilarGames($id)
    {
        $sql = 'select OTHER_GAME_ID as id, OTHER_GAME_COVER as cover,'
            . ' OTHER_GAME_NAME as title from similar_games where GAME_ID = ' . $id . ' order by RAND() limit 10';
        return $this->executeRequest($sql);
    }


    function getScreenshotsGame($id)
    {
        $sql = 'select SCREENSHOT_URL as screenshot'
            . ' from screenshots where GAME_ID = ' . $id;
        return $this->executeRequest($sql);
    }

    function getVideos($id)
    {
        $sql = 'select VIDEO_ID as vid_url from videos where GAME_ID = ' . $id;
        return $this->executeRequest($sql);
    }
    function getArtwork($id)
    {
        $sql = 'SELECT ARTWORK_URL FROM artworks where game_id = ' . $id;
        return $this->executeRequest($sql);
    }

    function getSearch($lookup)
    {
        if(!empty($lookup)){
            $sql = 'select GAME_ID as id, GAME_COVER_URL as cover,'
                . ' GAME_NAME as title, GAME_SUMMARY as summary from games'
                . ' where GAME_NAME LIKE "%' . $lookup . '%" order by title ASC';
        }else{
            $sql = 'select GAME_ID as id, GAME_COVER_URL as cover,'
                . ' GAME_NAME as title, GAME_SUMMARY as summary from games order by RAND() limit 30';
        }
        return $this->executeRequest($sql);
    }

    function getReleases($id)
    {
        $sql = 'select g.GAME_ID as id, r.PLATFORM_ID,p.PLATFORM_NAME,r.RELEASE_DATE,r.RELEASE_REGION '
            . ' from games as g right join game_release as r on g.GAME_ID=r.GAME_ID '
            . ' left join platform as p on r.PLATFORM_ID = p.PLATFORM_ID where g.GAME_ID =' . $id;
        return $this->executeRequest($sql);
    }
    function getAlternativeNames($id)
    {
        $sql = 'select ALT_NAME as name'
            . ' from alternative_names where GAME_ID = ' . $id;
        return $this->executeRequest($sql);
    }
    function getModes($id)
    {
        $sql = 'select m.MODE_NAME from game_mode as g left join mode as m on g.mode_id = m.mode_id'
        .' WHERE g.game_id = ' . $id;
        return $this->executeRequest($sql);
    }
    function getGenres($id)
    {
        $sql = 'SELECT genre.GENRE_NAME as name, game_genre.GENRE_ID as id FROM game_genre LEFT JOIN genre ON game_genre.GENRE_ID = genre.GENRE_ID'
        .' WHERE GAME_ID = ' . $id;
        return $this->executeRequest($sql);
    }
    function getURLs($id)
    {
        $sql = 'select website_cat,website_url from website  where game_id = ' . $id;
        return $this->executeRequest($sql);
    }

}
