<?php
include 'Model/categories/modelcategory.php';
class categoryDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }
    public function add_users($name,$email,$password){



    }

}
?>