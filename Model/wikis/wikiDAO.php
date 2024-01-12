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
            $wikis[] = new wiki($B["id"], $B["user_id"],$B["title"],$B["content"],$B["date_created"],$B["category_id"],$B["archived"],$B["image"]);
        }
        return $wikis;
    }
    public function get_wikis_by_user_id($id){
        
        $query = "SELECT * FROM wikis WHERE user_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id' , $id , PDO::PARAM_INT);
        $stmt -> execute();
        $wikiDATA = $stmt->fetchAll();
        $wikis = array();
        foreach ($wikiDATA as $B) {
            $wikis[] = new wiki($B["id"], $B["user_id"],$B["title"],$B["content"],$B["date_created"],$B["category_id"],$B["archived"],$B["image"]);
        }
        return $wikis;
    }
    public function get_wikis_for_json(){
        $query = "SELECT wikis.*,GROUP_CONCAT(tags.name) AS tag_names , categories.name as category_name FROM wikis INNER JOIN wiki_tags on wikis.id = wiki_tags.wiki_id INNER JOIN tags on wiki_tags.tag_id  = tags.id INNER JOIN categories on categories.id = wikis.category_id GROUP BY
        wikis.id;";
        // $query = "SELECT * FROM wikis;";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_wikis_for_json_by_title($title) {
        $query = "SELECT wikis.*, GROUP_CONCAT(tags.name) AS tag_names, categories.name as category_name FROM wikis
                  INNER JOIN wiki_tags ON wikis.id = wiki_tags.wiki_id
                  INNER JOIN tags ON wiki_tags.tag_id = tags.id
                  INNER JOIN categories ON categories.id = wikis.category_id
                  WHERE wikis.title LIKE CONCAT('%', :title, '%')
                  GROUP BY wikis.id;";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function get_wikis_for_json_by_tag($tag) {
        $query = "SELECT wikis.*, GROUP_CONCAT(tags.name) AS tag_names, categories.name as category_name
                  FROM wikis
                  INNER JOIN wiki_tags ON wikis.id = wiki_tags.wiki_id
                  INNER JOIN tags ON wiki_tags.tag_id = tags.id
                  INNER JOIN categories ON categories.id = wikis.category_id
                  GROUP BY wikis.id
                  HAVING tag_names LIKE CONCAT('%', :tag, '%');";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function get_wikis_for_json_by_category($category){
        $query = "SELECT wikis.*,GROUP_CONCAT(tags.name) AS tag_names,categories.name as category_name FROM wikis INNER JOIN wiki_tags on wikis.id = wiki_tags.wiki_id INNER JOIN tags on wiki_tags.tag_id  = tags.id INNER JOIN categories on categories.id = wikis.category_id WHERE categories.name LIKE :category GROUP BY
        wikis.id;";
        
        // $query = "SELECT * FROM wikis;";
        $categoryWithWildcards = "%$category%";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':category', $categoryWithWildcards, PDO::PARAM_STR);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_wikis_by_id($id){
        $query = "SELECT * FROM wikis WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_STR);
        $stmt -> execute();
        $wikiDATA = $stmt->fetchAll();
        $wikis = array();
        foreach ($wikiDATA as $B) {
            $wikis[] = new wiki($B["id"], $B["user_id"],$B["title"],$B["content"],$B["date_created"],$B["category_id"],$B["archived"],$B["image"]);
        }
        return $wikis;
    }
    public function update_wiki($title, $editor_content, $userid, $fileName, $id) {
        $query = "UPDATE wikis SET title = :title, content = :content, user_id = :user_id, image = :image WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $editor_content, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $userid, PDO::PARAM_INT);
        $stmt->bindParam(':image', $fileName, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    public function disable_wiki($id){
        $query = "UPDATE wikis SET archived = 0 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
    }
    public function enale_wiki($id){
        $query = "UPDATE wikis SET archived = 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt -> execute();
    }
}


?>