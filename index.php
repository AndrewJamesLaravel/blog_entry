<?php

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include_once "models/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL blog demo example";
$pageData->addCSS("css/blog.css");
$pageData->addScript("js/lightbox.js");

$dbInfo = "mysql:host=localhost;dbname=simple_blog;charset=utf8";
$dbUser = "root";
$dbPassword = "0000";
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$pageRequested = isset( $_GET['page'] );
//default controller is blog
$controller = "blog";
if ( $pageRequested ) {
    //if user submitted the search form
    if ( $_GET['page'] === "search" ) {
        $controller = "search";
    }
}

$pageData->content .= include_once "views/search-form-html.php";
$pageData->content .= include_once "controllers/$controller.php";

$page = include_once "views/page.php";
echo $page;