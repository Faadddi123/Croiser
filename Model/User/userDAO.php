<?php
include 'Model/Connection/connexion.php';
include 'Model/User/modeluser.php';
class usersDAO{
        private $db;
        public function __construct(){
            $this->db = Database::getInstance()->getConnection(); 
        }

    public function add_user($name,$email,$password){
        $query = "INSERT INTO users (email,name,password) VALUE (:email,:name,:password);";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':email', $email, PDO::PARAM_STR);
        $stmt->bindparam(':name', $name, PDO::PARAM_STR);
        $stmt->bindparam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

    }
    public function sign_in($email,$password){
        $query = "SELECT * FROM users WHERE email = :email AND password = :password;";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':email', $email, PDO::PARAM_STR);
        
        $stmt->bindparam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_users = count($result);
        if( $number_of_users == 1 ){
            $idofthe_champion = $result[0]["id"];
            $_SESSION['user'] = $idofthe_champion;
            header("Location:index.php?action=gohome");
        }else{
            header("Location:index.php?action=signin");
        }
        
    }
}
?>