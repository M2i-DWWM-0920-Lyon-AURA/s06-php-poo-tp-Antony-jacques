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
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
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
