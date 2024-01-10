<?php
include 'Model/Connection/connexion.php';
include 'Model/wikis/modelwiki.php';
class wikiDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function add_wiki($title,$content,$userid,$fileName){
        $query = "INSERT INTO wikis (title , content , user_id, image) VALUES (:title , :content,:user_id, :image);";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':title' , $title , PDO::PARAM_STR);
        $stmt->bindparam(':content' , $content , PDO::PARAM_STR);
        $stmt->bindparam(':user_id' , $userid , PDO::PARAM_INT);
        $stmt->bindparam(':image' , $fileName , PDO::PARAM_STR);
        $stmt->execute();

    }
    public function get_wikis(){
        $query = "SELECT * FROM wikis";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $wikiDATA = $stmt->fetchAll();
        $wikis = array();
        foreach ($wikiDATA as $B) {
            $wikis[] = new wiki($B["id"], $B["user_id"],$B["title"],$B["content"],$B["date_created"]);
        }
        return $wikis;
    }
    public function get_wikis_for_json(){
        $query = "SELECT wikis.*,GROUP_CONCAT(tags.name) AS tag_names FROM wikis INNER JOIN wiki_tags on wikis.id = wiki_tags.wiki_id INNER JOIN tags on wiki_tags.tag_id  = tags.id GROUP BY
        wikis.id;";
        // $query = "SELECT * FROM wikis;";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_wikis_by_id($id){
        $query = "SELECT * FROM wikis WHERE id = :id";

        $stmt = $this->db->query($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        $stmt -> execute();
        $wikiDATA = $stmt->fetchAll();
        $wikis = array();
        foreach ($wikiDATA as $B) {
            $wikis[] = new wiki($B["id"], $B["user_id"],$B["title"],$B["content"],$B["date_created"]);
        }
        return $wikis;
    }
}


?>