<?php

include_once "models/Uploader.class.php";

$imageSubmitted = isset( $_POST['new-image'] );
if ( $imageSubmitted ) {
    $uploader = new Uploader( 'image-data' );
    $uploader->saveIn( "img" );
    try {
        $uploader->save();
        $uploadMessage = "file uploaded!";
    } catch ( Exception $exception ) {
        $uploadMessage = $exception->getMessage();
    }
}

$imageManagerHTML = include_once  "views/admin/images-html.php";
return $imageManagerHTML;