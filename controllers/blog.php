<?php

include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table( $db );

$isEntryClicked = isset( $_GET['id'] );
if ( $isEntryClicked ) {
    $entryId = $_GET['id'];
    $entryData = $entryTable->getEntry( $entryId );
    $blogOutput = include_once "views/entry-html.php";
} else {
    //$entries is the PDOStatement returned from getAllEntries
    $entries = $entryTable->getAllEntries();
    $blogOutput = include_once "views/list-entries-html.php";
}

return $blogOutput;