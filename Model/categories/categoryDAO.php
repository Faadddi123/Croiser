<?php

include 'Model/categories/modelcategory.php';
class categoryDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    

    public function get_category(){
        $query = "SELECT * FROM categories LIMIT 6";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $categoryDATA = $stmt->fetchAll();
        $categories = array();
        foreach ($categoryDATA as $B) {
            $categories[] = new category($B["id"], $B["name"]);
        }
        return $categories;
    }
    public function get_Allcategory(){
        $query = "SELECT * FROM categories ";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $categoryDATA = $stmt->fetchAll();
        $categories = array();
        foreach ($categoryDATA as $B) {
            $categories[] = new category($B["id"], $B["name"]);
        }
        return $categories;
    }
    public function get_number_of_wikis_by_ids($id){
        $query = "SELECT count(categories.id) as numberofcategories FROM categories INNER JOIN wikis on categories.id = wikis.category_id WHERE categories.id = :id GROUP BY categories.id";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categories = array();
        $number_of_users = count($result);
        if( $number_of_users == 1 ){
            $categoryname = $result[0]["numberofcategories"];
            return $categoryname;
        }else{
            return "Not assined to any wiki";
        }
    }

    public function get_category_name_by_id($id){
        $query = "SELECT name as category_name FROM categories WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $number_of_users = count($result);
        if( $number_of_users == 1 ){
            $categoryname = $result[0]["category_name"];
            return $categoryname;
        }else{
            return "No category assined";
        }
            
       
    }


}
?>