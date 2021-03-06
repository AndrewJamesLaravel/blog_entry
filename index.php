<?php

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include_once "models/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL blog demo example";
$pageData->addCSS("css/blog.css");

$dbInfo = "mysql:host=localhost;dbname=simple_blog;charset=utf8";
$dbUser = "root";
$dbPassword = "0000";
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$pageData->content .= include_once "controllers/blog.php";
$page = include_once "views/page.php";
echo $page;