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
        

  // Escape HTML entities to prevent XSS
  
        $userid = $_SESSION['user'];
        extract($_POST);
        // $content = htmlspecialchars($editor_content, ENT_QUOTES, 'UTF-8');
        $wikiDAO = new wikiDAO();
        
        $wikiDAO->add_wiki($title,$editor_content,$userid);
        $controller_wikis = new controller_wikis();
        $controller_wikis->getwikis();
        
    }

    function uploadImage(){
        upload_image();
        
    }

    function getwikis(){

        $wikiDAO = new wikiDAO();
        $wikis = $wikiDAO->get_wikis();

        include 'View/affichage.php';

    }
    function getwikisById(){

        $wikiDAO = new wikiDAO();
        //khasni n7at l id;
        $wikis = $wikiDAO->get_wikis_by_id($id);

        

    }

}
class controller_categories{
    function getCategories(){
        $categoryDAO = new categoryDAO();
        $categories = $categoryDAO->get_category();
        include 'View/homepage.php';

    }
}


?>