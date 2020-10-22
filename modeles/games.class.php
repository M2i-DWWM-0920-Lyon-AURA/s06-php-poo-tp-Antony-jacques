<?php

class Game
{
    private $id;
    private $title;
    private $release_date;
    private $link;
    private $developer_id;
    private $platform_id;

    public function __construct($id, $title, $release_date, $link, $developer_id, $platform_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->release_date = $release_date;
        $this->link = $link;
        $this->developer_id = $developer_id;
        $this->platform_id = $platform_id;

    }

}

function createNewGame($id, $title, $release_date, $link, $developer_id, $platform_id)
{
    return new Game ($id, $title, $release_date, $link, $developer_id, $platform_id);
}

 function fetchAllGames()
{
    global $dbh;
    $statement= $dbh->query('SELECT * FROM `game` LIMIT 50 ');
    return $statement->fetchAll(PDO::FETCH_FUNC, 'createNewGame');

}
