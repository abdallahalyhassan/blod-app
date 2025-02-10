<?php
session_start();
require_once('./inc/header.php');
require_once('./helper/helper.php');
require_once('./core/validation.php');
require_once('./config/db_connection.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case "home":
        include "./view/home.php";
        break;
    case "register":
        include "./view/auth/Register.php";
        break;
    case "sign-up":
        include "./controlers/auth/sign-up.php";
        break;
    case "login":
        include "./view/auth/login.php";
        break;
    case "logout":
        include "./controlers/auth/logout.php";
        break;
    case "auth-login":
        include "./controlers/auth/auth-login.php";
        break;
    case "add-blog":
        include "./view/blog/add-blog.php";
        break;
    case "store-blog":
        include "./controlers/blog/add-blog.php";
        break;
    case "delete-blog":
        include "./controlers/blog/delete-blog.php";
        break;
    case "single-blog":
        include "./view/blog/single-blog.php";
        break;
        
    
        

    default:
        echo " 404  page not found ";
}






















require_once('inc/footer.php');
