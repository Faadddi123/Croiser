<?php
include 'Model/tags/modeltags.php';
class tagsDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

}
?>