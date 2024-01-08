<?php
include 'Model/wikis/modelwiki.php';
class wikiDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function add_wiki($title,$content,$userid){
        $query = "INSERT INTO wikis (title , content , user_id) VALUES (:title , :content,:user_id);";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':title' , $title , PDO::PARAM_STR);
        $stmt->bindparam(':content' , $content , PDO::PARAM_STR);
        $stmt->bindparam(':user_id' , $userid , PDO::PARAM_INT);
        $stmt->execute();

    }
}


?>