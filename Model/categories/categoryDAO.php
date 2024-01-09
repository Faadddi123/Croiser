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


}
?>