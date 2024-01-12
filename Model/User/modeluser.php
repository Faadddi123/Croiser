<?php 
class user{
    private $id;
    private $name;
    private $email;
    private $howmanywikis;
    public function __construct($id, $name ,$email
        ){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;

        
        }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of howmanywikis
     *
     * @return  self
     */ 
    public function setHowmanywikis($howmanywikis)
    {
        $this->howmanywikis = $howmanywikis;

        return $this;
    }

    /**
     * Get the value of howmanywikis
     */ 
    public function getHowmanywikis()
    {
        return $this->howmanywikis;
    }
}

?>