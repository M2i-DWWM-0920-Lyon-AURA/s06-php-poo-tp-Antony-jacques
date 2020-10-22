<?php

class Game
{
    private $id;
    private $title;
    private $release_date;
    private $link;
    private $developer_id;
    private $platform_id;

    public function __construct($id, $name,$link)
    {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
    }

}

function createNewDev($id, $name,$link)
{
    return new Developer ($id, $name, $link);
}

 function fetchAllDev()
{
    global $dbh;
    $statement= $dbh->query('SELECT * FROM `developer` LIMIT 50 ');
    return $statement->fetchAll(PDO::FETCH_FUNC, 'createNewDev');

}
