<?php
include 'Controller/Generalcontroller.php';
$contoller_horraires = new controller_users();

$contoller_wikis = new controller_wikis();
session_start();
if (isset($_GET["action"])) {
    $action = $_GET["action"];

    if ($action === "adduser") {

        $contoller_horraires->adduser() ;
    }
    if ($action === "signin") {
      
        include 'View/Signin.php';
    }
    if ($action === "trysign"){
        $contoller_horraires->signin();
    }
    if ($action === "gohome"){
        var_dump($_SESSION['user']);
        include 'View/homepage.php';
    }
    if ($action === "pushiha"){

        $contoller_wikis->wikis();
        
    }
    if ($action === "upload-image"){
        $contoller_wikis->uploadImage();
    
    }
}else{

    include 'View/signup.php';
}
?>