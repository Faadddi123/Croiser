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
    public function gettags_And_Count($id){
        $query = "SELECT count(tags.id) as numberoftags FROM tags INNER JOIN wiki_tags on tags.id = wiki_tags.tag_id INNER JOIN wikis on wiki_tags.wiki_id = wikis.id WHERE tags.id = :id GROUP BY tags.id";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categories = array();
        $number_of_tags = count($result);
        if( $number_of_tags == 1 ){
            $tagsname = $result[0]["numberoftags"];
            return $tagsname;
        }else{
            return "Not assined to any wiki";
        }
    }
    public function gettags_ALL(){
        $query = "SELECT * FROM tags";
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