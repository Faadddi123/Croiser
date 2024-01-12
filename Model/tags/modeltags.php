<?php
class tags{
    private $id;
    private $name;
    private $NumberOfTagsInEachWiki;
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
     * Get the value of NumberOfTagsInEachWiki
     */ 
    public function getNumberOfTagsInEachWiki()
    {
        return $this->NumberOfTagsInEachWiki;
    }

    /**
     * Set the value of NumberOfTagsInEachWiki
     *
     * @return  self
     */ 
    public function setNumberOfTagsInEachWiki($NumberOfTagsInEachWiki)
    {
        $this->NumberOfTagsInEachWiki = $NumberOfTagsInEachWiki;

        return $this;
    }
}

?>