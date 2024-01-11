<?php 


class category{

    private $id;
    private $name;
    private $number_in_wikis;

    public function __construct($id, $name
        ){
            $this->id = $id;
            $this->name = $name;

        
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
     * Get the value of number_in_wikis
     */ 
    public function getNumber_in_wikis()
    {
        return $this->number_in_wikis;
    }

    /**
     * Set the value of number_in_wikis
     *
     * @return  self
     */ 
    public function setNumber_in_wikis($number_in_wikis)
    {
        $this->number_in_wikis = $number_in_wikis;

        return $this;
    }
}



?>