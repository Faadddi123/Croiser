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

        include 'View/adminView/register.php';
        
    }
    function getusersForTable(){
        $usersDAO = new usersDAO();
        $users = $usersDAO->get_users();
        foreach($users as $user):
            $user->setHowmanywikis($usersDAO->get_number_of_wikis($user->getId()));
        endforeach;
        include 'View/adminView/tables_users.php';
       
    }

    function signin(){
        extract($_POST);
        $usersDAO = new usersDAO();
        $usersDAO->sign_in($email,$password);
    }

}
class controller_tags{
    function gettagsAndCount(){
        $tagsDAO = new tagsDAO();
        $tags = $tagsDAO->gettags_ALL();
        foreach($tags as $tag):
            $tag->setNumberOfTagsInEachWiki($tagsDAO->gettags_And_Count($tag->getId()));
        endforeach;
        include 'View/adminView/tables_tags.php';
    }
}
class controller_wikis{
    function wikis(){
        
        $wikiDAO = new wikiDAO();
  // Escape HTML entities to prevent XSS
  $userid = $_SESSION['user'];
  extract($_POST);
  $uploadPath = 'View/image_uploaded'; // Adjust the path as needed
  
  if (isset($_FILES['image_uploaded']) && $_FILES['image_uploaded']['error'] === UPLOAD_ERR_OK) {
      $tempPath = $_FILES['image_uploaded']['tmp_name'];
      $fileName = $_FILES['image_uploaded']['name'];
      $targetPath = $uploadPath . $fileName;
      
      move_uploaded_file($tempPath, $targetPath);
      
      // Return JSON response with details
      echo json_encode([
          'uploaded' => true,
          'url' => 'image_uploaded/' . $fileName
        ]);
    } else {
        // Return JSON response with error message
        echo json_encode([
            'uploaded' => false,
            'error' => 'Upload failed.'
        ]);
    }
    if(isset($_GET['idwiki'])){
        $id = $_GET['idwiki'];
        var_dump($fileName);
        $wikiDAO->update_wiki($title,$editor_content,$userid,$fileName,$id);
    }
        // $content = htmlspecialchars($editor_content, ENT_QUOTES, 'UTF-8');
        
        
        $wikiDAO->add_wiki($title,$editor_content,$userid,$fileName);
        header('Location: index.php?action=dinilindex');
        
    }

    function uploadImage(){
        // upload_image();
        
    }
    function diplaytheedits(){
        $wikiDAO = new wikiDAO();
        $id = 0;
        $title = '';
        $editor_content = '';
        $fileName = '';
        if(isset($_GET['idwiki'])){
            $id = $_GET['idwiki'];
            $wiki = $wikiDAO->get_wikis_by_id($id);
            $title = $wiki[0]->getTitle();
            $editor_content = $wiki[0]->getContent();
            $fileName = $wiki[0]->getImage();
            var_dump($fileName);
        }
        include 'View/Signin.php';
    }
    function getwikis(){

        $wikiDAO = new wikiDAO();
        $categoryDAO = new categoryDAO();
        $tagsDAO = new tagsDAO();
        $wikis = $wikiDAO->get_wikis();
        $categories = $categoryDAO->get_category();
        $tags = $tagsDAO->get_tags_for_displaying();
        
        include 'View/homepage.php';

    }
    function DisableWiki(){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $wikiDAO = new wikiDAO();
        $wikiDAO->disable_wiki($id);
        header('Location: index.php?action=admin_wiki');
    }
    function EnableWiki(){
        $id = isset($_GET['id'])? $_GET['id'] : 0;
        $wikiDAO = new wikiDAO();
        $wikiDAO->enale_wiki($id);
        header('Location: index.php?action=admin_wiki');
    }
    function getwikisById(){

        $wikiDAO = new wikiDAO();
        //khasni n7at l id;
        $wikis = $wikiDAO->get_wikis_by_id($id);

    }
    function display_table_wiki(){
        $wikiDAO = new wikiDAO();
        $usersDAO = new usersDAO();
        $categoryDAO = new categoryDAO();
        $wikis = $wikiDAO->get_wikis();
        foreach($wikis as $wiki):
            $wiki->setUser_name($usersDAO->get_Name_by_id($wiki->getUser_id()));
            $wiki->setCategory_name($categoryDAO->get_category_name_by_id($wiki->getCategory_id()));
            
        endforeach;
        include 'View/adminView/tables_wikis.php';
    }
    function display_table_wiki_for_each_user(){
        $id = $_SESSION['user'];
        $wikiDAO = new wikiDAO();
        $usersDAO = new usersDAO();
        $categoryDAO = new categoryDAO();
        $wikis = $wikiDAO->get_wikis_by_user_id($id);
        foreach($wikis as $wiki):
            $wiki->setUser_name($usersDAO->get_Name_by_id($wiki->getUser_id()));
            $wiki->setCategory_name($categoryDAO->get_category_name_by_id($wiki->getCategory_id()));
            
        endforeach;
        include 'View/adminView/Usertable.php';
    }

}
class controller_categories{
    function getCategories(){
        $categoryDAO = new categoryDAO();
        $categories = $categoryDAO->get_category();
        include 'View/homepage.php';

    }
    function getCategoriesAndCount(){
        $categoryDAO = new categoryDAO();
        $categories = $categoryDAO->get_ALLcategory();
        foreach($categories as $category):
            $category->setNumber_in_wikis($categoryDAO->get_number_of_wikis_by_ids($category->getId()));
        endforeach;
        include 'View/adminView/tables_category.php';

    }

}

// ExampleController.php
class Controller_Json {


    public function ajaxDropdown() {
        $wikiDAO = new wikiDAO();
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $tag = isset($_GET['tag']) ? $_GET['tag'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        if(!empty($title)){
           
            $wikis = $wikiDAO->get_wikis_for_json_by_title($title);
        }else if(!empty($tag)){
           
            $wikis = $wikiDAO->get_wikis_for_json_by_tag($tag);
        }else if(!empty($category)){
         
            $wikis = $wikiDAO->get_wikis_for_json_by_category($category);
        }else{
            $wikis = $wikiDAO->get_wikis_for_json();
        }
        
        $usersDAO = new usersDAO();
        
   
        $data = array();
        header('Content-Type: application/json');
        echo json_encode($wikis);
        exit;
    
        // Structure data
        // foreach ($wikis as $wiki) {
        //     $wiki->setUser_name($usersDAO->get_Name_by_id($wiki->getUser_id()));
    
        //     $data[] = array(
        //         'id' => $wiki->getId(),
        //         'user_id' => $wiki->getUser_id(),
        //         'category_id' => $wiki->getCategory_id(),
        //         'title' => $wiki->getTitle(),
        //         'content' => $wiki->getContent(),
        //         'date_created' => $wiki->getDate_created(),
        //         'tags_id' => $wiki->getTags_id(),
        //         'user_name' => $wiki->getUser_name(),  // Corrected here
        //         'category_name' => $wiki->getCategory_name(),  // Corrected here
        //         'tags_name' => $wiki->getTags_name(),  // Corrected here
        //         // Add other fields as needed
        //     );
        // }
    
        // Return JSON response
    }
    
}

?>