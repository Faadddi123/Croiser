<?php
include 'Controller/Generalcontroller.php';
$controller_users = new controller_users();
$controller_wikis = new controller_wikis();
$controller_categories = new controller_categories();
$controller_tags = new controller_tags();
$controller_json = new Controller_Json();
session_start();
$type = isset($_SESSION['type']) ? $_SESSION['type'] : '';
if (isset($_GET["action"])) {
    $action = $_GET["action"];

    switch ($action) {
        case "adduser":
            $controller_users->adduser();
            break;

        case "signin":
            include 'View/Signup.php';
            break;

        case "trysign":
            $controller_users->signin();
            break;

        case "gohome":
            if($type === 'user'){
                $controller_wikis->diplaytheedits();
            }else{
                
                header('Location: index.php?action=dinilindex');
            }
           
            
            
            
            break;

        case "pushiha":
            $controller_wikis->wikis();
            

        exit();
            break;

        case "upload-image":
            $controller_wikis->uploadImage();
            break;
        case "seepage":
            // $controller_categories->getCategories();
            $controller_json->ajaxDropdown();
        case "json":
            include 'View/jsonnat.php';
            break;
            case "dinilindex":
            $controller_wikis->getwikis();
                break;
        case "page":
            $controller_wikis->getwikis();
             
            break;
        case "contuct":
            include 'View/contact.php';
            break;
        case "realhome":
            include 'View/index.php';
            break;
        case "404":
            include 'View/404.php';
            break;
        case "admin_wiki":
            if($type === 'admin'){
                $controller_wikis->display_table_wiki();
            }else{
                header('Location: index.php?action=dinilindex');
            } 
            
            break;
        case "admin":
            if($type === 'admin'){
                include 'View/adminView/stats.php';
            }else{
                header('Location: index.php?action=dinilindex');
            } 
            
            break;
        case "user_table":
            $controller_wikis->display_table_wiki_for_each_user();
            break;
        
            $controller_wikis->display_table_wiki_for_each_user();
            break;
        case "admin_category":
            if($type === 'admin'){
                $controller_categories->getCategoriesAndCount();
            }else{
                header('Location: index.php?action=dinilindex');
            }
            
            break;
        case "admin_tags":
            if($type === 'admin'){
                $controller_tags->gettagsAndCount();
            }else{
                header('Location: index.php?action=dinilindex');
            }
            
            break;
        case "admin_users":
            if($type === 'admin'){
                $controller_users->getusersForTable();
            }else{
                header('Location: index.php?action=dinilindex');
            }
            
            break;
        case "wiki_disable":
            if($type === 'admin'){
                $controller_wikis->DisableWiki();
            }else{
                header('Location: index.php?action=dinilindex');
            }
            
            break;
        case "wiki_enable":
            if($type === 'admin'){
                $controller_wikis->EnableWiki();
            }else{
                header('Location: index.php?action=dinilindex');
            }
            
            break;
        // case "wiki_edit":
        //     $controller_wikis->DisableWiki();
        //     break;
        // case "wiki_delete":
        //     $controller_wikis->EnableWiki();
        //     break;
        case "Insert_for_admin":
            if($type === 'admin'){
                include 'View/adminView/blankcopy.php';
            }else{
                header('Location: index.php?action=dinilindex');
            }
            
            break;
        case "Usertable":
            if($type === 'user'){
                
            }else{
                $controller_wikis->display_table_wiki_for_each_user();
                header('Location: index.php?action=dinilindex');
            }
            
            break;
    }
} else {
    include 'View/signup.php';
}
?>