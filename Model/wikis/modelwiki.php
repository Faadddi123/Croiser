<?php 


class wiki{

    private $id;
    private $user_id;
    private $category_id;
    private $title;
    private $content;
    private $date_created;
    private $archived;
  
    private $user_name;
    private $category_name;
    private $tags_name;
    private $image;

    public function __construct($id, $user_id,$title,$content,$date_created,$category_id,$archived,$image
        ){
            $this->id = $id;
            $this->user_id = $user_id;
            $this->title = $title;
            $this->content = $content;
            $this->date_created = $date_created;
            $this->category_id = $category_id;
            $this->archived = $archived;
            $this->image = $image;
        
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


    /**
     * Set the value of user_name
     *
     * @return  self
     */ 
    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }

    /**
     * Get the value of user_name
     */ 
    public function getUser_name()
    {
        return $this->user_name;
    }

    /**
     * Get the value of category_name
     */ 
    public function getCategory_name()
    {
        return $this->category_name;
    }

    /**
     * Set the value of category_name
     *
     * @return  self
     */ 
    public function setCategory_name($category_name)
    {
        $this->category_name = $category_name;

        return $this;
    }

    /**
     * Get the value of tags_name
     */ 
    public function getTags_name()
    {
        return $this->tags_name;
    }

    /**
     * Set the value of tags_name
     *
     * @return  self
     */ 
    public function setTags_name($tags_name)
    {
        $this->tags_name = $tags_name;

        return $this;
    }

    /**
     * Get the value of archived
     */ 
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }
}



?>