<?php
include 'Controller/Generalcontroller.php';
$controller_users = new controller_users();
$controller_wikis = new controller_wikis();
$controller_categories = new controller_categories();
$controller_tags = new controller_tags();
$controller_json = new Controller_Json();
session_start();

if (isset($_GET["action"])) {
    $action = $_GET["action"];

    switch ($action) {
        case "adduser":
            $controller_users->adduser();
            break;

        case "signin":
            include 'View/Signin.php';
            break;

        case "trysign":
            $controller_users->signin();
            break;

        case "gohome":
            var_dump($_SESSION['user']);
            include 'View/home.php';
            
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
            $controller_wikis->display_table_wiki();
            break;
        case "admin_category":
            $controller_categories->getCategoriesAndCount();
            break;
        case "admin_tags":
            $controller_tags->gettagsAndCount();
            break;
        case "admin_users":
            $controller_users->getusersForTable();
            break;
        case "wiki_disable":
            $controller_wikis->DisableWiki();
            break;
        case "wiki_enable":
            $controller_wikis->EnableWiki();
            break;
        case "wiki_edit":
            $controller_wikis->DisableWiki();
            break;
        case "wiki_delete":
            $controller_wikis->EnableWiki();
            break;
        case "Insert_for_admin":
            include 'View/adminView/blankcopy.php';
            break;
    }
} else {
    include 'View/signup.php';
}
?>