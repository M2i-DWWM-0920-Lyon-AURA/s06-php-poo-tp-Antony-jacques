<?php

class Platform
{
    private $id;
    private $name;
    private $link;

    public function __construct($id, $name,$link)
    {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
    }

}

function createNewPlatform($id, $name,$link)
{
    return new Platform ($id, $name, $link);
}

 function fetchAllPlatform()
{
    global $dbh;
    $statement= $dbh->query('SELECT * FROM `platform` LIMIT 50 ');
    return $statement->fetchAll(PDO::FETCH_FUNC, 'createNewPlatform');

}
