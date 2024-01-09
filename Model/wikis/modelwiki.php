<?php 


class wiki{

    private $id;
    private $user_id;
    private $category_id;
    private $title;
    private $content;
    private $date_created;

    public function __construct($id, $user_id,$title,$content,$date_created
        ){
            $this->id = $id;
            $this->user_id = $user_id;
            $this->title = $title;
            $this->content = $content;
            $this->date_created = $date_created;
        
        }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the value of date_created
     */ 
    public function getDate_created()
    {
        return $this->date_created;
    }
}



?>