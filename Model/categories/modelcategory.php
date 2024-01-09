<?php 


class category{

    private $id;
    private $name;


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
}



?>