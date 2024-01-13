<?php

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
            if($result[0]["role"] === 'admin'){
                $_SESSION['type'] = 'admin';
            }else{
                $_SESSION['type'] = 'user';
            }
            header("Location:index.php?action=gohome");
        }else{
            header("Location:index.php?action=signin");
        }
        
    }
    public function get_users(){
        $query = "SELECT * FROM users;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = array();
        foreach ($result as $B) {
            $users[] = new user($B["id"], $B["name"],$B["email"]);
        }
        return $users;
    }
    public function get_Name_by_id($id){
        $query = "SELECT * FROM users WHERE id = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_users = count($result);
        if( $number_of_users == 1 ){
            $idofthe_champion = $result[0]["name"];
            return $idofthe_champion;
        }else{
            return false;
        }
    }

    public function get_number_of_wikis($id){
        $query = "SELECT count(wikis.user_id) as howmanywikis FROM wikis INNER JOIN users on wikis.user_id = users.id WHERE users.id = :id GROUP BY wikis.user_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_users = count($result);
        if( $number_of_users == 1 ){
            $idofthe_champion = $result[0]["howmanywikis"];
            return $idofthe_champion;
        }else{
            return false;
        }
    }
}
?>