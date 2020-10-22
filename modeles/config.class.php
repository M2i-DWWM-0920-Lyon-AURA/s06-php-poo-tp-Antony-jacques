<?php

class Config
{
    protected $game_id;
    protected $title;
    protected $release_date;
    protected $game_link;
    protected $developer_id;
    protected $platform_id;

    protected $dev_id;
    protected $dev_name;
    protected $dev_link;
    
    protected $platforms_id;
    protected $platform_name;
    protected $platform_link;

    function __construct(
        $game_id,
        $title,
        $release_date,
        $game_link,
        $developer_id,
        $platform_id,
        $dev_id,
        $dev_name,
        $dev_link,
        $platforms_id,
        $platform_name,
        $platform_link
    )

    {
        $this->game_id = $game_id ;
        $this->title  = $title ;
        $this->release_date  = $release_date ;
        $this->game_link  = $game_link ;
        $this->developer_id  = $developer_id ;
        $this->platform_id  = $platform_id ;
        $this->dev_id  = $dev_id ;
        $this->dev_name  = $dev_name ;
        $this->dev_link  = $dev_link ;
        $this->platform_id  = $platforms_id ;
        $this->platform_name  = $platform_name ;
        $this->platform_link  = $platform_link ;

    }



    /**
     * Get the value of game_id
     */ 
    public function getGame_id()
    {
        return $this->game_id;
    }

    /**
     * Set the value of game_id
     *
     * @return  self
     */ 
    public function setGame_id($game_id)
    {
        $this->game_id = $game_id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of release_date
     */ 
    public function getRelease_date()
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     *
     * @return  self
     */ 
    public function setRelease_date($release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * Get the value of game_link
     */ 
    public function getGame_link()
    {
        return $this->game_link;
    }

    /**
     * Set the value of game_link
     *
     * @return  self
     */ 
    public function setGame_link($game_link)
    {
        $this->game_link = $game_link;

        return $this;
    }

    /**
     * Get the value of developer_id
     */ 
    public function getDeveloper_id()
    {
        return $this->developer_id;
    }

    /**
     * Set the value of developer_id
     *
     * @return  self
     */ 
    public function setDeveloper_id($developer_id)
    {
        $this->developer_id = $developer_id;

        return $this;
    }

    /**
     * Get the value of platform_id
     */ 
    public function getPlatform_id()
    {
        return $this->platform_id;
    }

    /**
     * Set the value of platform_id
     *
     * @return  self
     */ 
    public function setPlatform_id($platform_id)
    {
        $this->platform_id = $platform_id;

        return $this;
    }

    /**
     * Get the value of dev_id
     */ 
    public function getDev_id()
    {
        return $this->dev_id;
    }

    /**
     * Set the value of dev_id
     *
     * @return  self
     */ 
    public function setDev_id($dev_id)
    {
        $this->dev_id = $dev_id;

        return $this;
    }

    /**
     * Get the value of dev_name
     */ 
    public function getDev_name()
    {
        return $this->dev_name;
    }

    /**
     * Set the value of dev_name
     *
     * @return  self
     */ 
    public function setDev_name($dev_name)
    {
        $this->dev_name = $dev_name;

        return $this;
    }

    /**
     * Get the value of dev_link
     */ 
    public function getDev_link()
    {
        return $this->dev_link;
    }

    /**
     * Set the value of dev_link
     *
     * @return  self
     */ 
    public function setDev_link($dev_link)
    {
        $this->dev_link = $dev_link;

        return $this;
    }

    /**
     * Get the value of platform_id
     */ 
    public function getPlatforms_id()
    {
        return $this->platforms_id;
    }

    /**
     * Set the value of platform_id
     *
     * @return  self
     */ 
    public function setPlatforms_id($platform_id)
    {
        $this->platforms_id = $platforms_id;

        return $this;
    }

    /**
     * Get the value of platform_name
     */ 
    public function getPlatform_name()
    {
        return $this->platform_name;
    }

    /**
     * Set the value of platform_name
     *
     * @return  self
     */ 
    public function setPlatform_name($platform_name)
    {
        $this->platform_name = $platform_name;

        return $this;
    }

    /**
     * Get the value of platform_link
     */ 
    public function getPlatform_link()
    {
        return $this->platform_link;
    }

    /**
     * Set the value of platform_link
     *
     * @return  self
     */ 
    public function setPlatform_link($platform_link)
    {
        $this->platform_link = $platform_link;

        return $this;
    }
}

function createNewConfig($game_id,
$title,
$release_date,
$game_link,
$developer_id,
$platform_id,
$dev_id,
$dev_name,
$dev_link,
$platforms_id,
$platform_name,
$platform_link)

{
    return new Config ($game_id,
    $title,
    $release_date,
    $game_link,
    $developer_id,
    $platform_id,
    $dev_id,
    $dev_name,
    $dev_link,
    $platforms_id,
    $platform_name,
    $platform_link,);
}

 function fetchAllConfig()
{
    global $dbh;
    $statement= $dbh->query('SELECT 
    game.id AS game_id,
    title,
    release_date,
    game.link AS game_link,
    developer_id,
    platform_id,
    
    developer.id AS dev_id,
    developer.name AS dev_name,
    developer.link as dev_link,
    
    platform.id AS platforms_id, 
    platform.name AS platform_name,
    platform.link as platform_link
    
    
    FROM `game`
    JOIN `developer`
    ON `game`.`developer_id` = `developer`.`id`
    JOIN platform
    ON game.platform_id = platform.id ');
    $results=$statement->fetchAll(PDO::FETCH_FUNC, 'createNewConfig');
    return ;
}