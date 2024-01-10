<?php
include 'Model/tags/modeltags.php';
class tagsDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function get_tags_for_displaying(){
        $query = "SELECT * FROM tags LIMIT 7";
        $stmt = $this->db->prepare($query);
        $stmt -> execute();
        $tagDATA = $stmt->fetchAll();
        $tags = array();
        foreach ($tagDATA as $B) {
            $tags[] = new tags($B["id"], $B["name"]);
        }
        return $tags;
    }

}
?>