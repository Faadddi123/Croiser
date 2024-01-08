<?php

include 'Model/categories/categoryDAO.php';
include 'Model/tags/tagsDAO.php';
include 'Model/User/userDAO.php';
include 'Model/wikis/wikiDAO.php';

class controller_users{

    function adduser(){
        extract($_POST);
        $usersDAO = new usersDAO();
        
        $usersDAO->add_user($name,$email,$password);

        include 'View/Signin.php';
        
    }

    function signin(){
        extract($_POST);
        $usersDAO = new usersDAO();
        $usersDAO->sign_in($email,$password);
    }

}
class controller_tags{

}
class controller_wikis{
    function wikis(){
        $userid = $_SESSION['user'];
        extract($_POST);
        $wikiDAO = new wikiDAO();
        var_dump($content);
        $wikiDAO->add_wiki($title,$content,$userid);
    }

    function uploadImage(){
        upload_image();
        
    }

}
class controller_categories{
    
}


?>