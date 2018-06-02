<?php

include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table( $db );
//$entries is the PDOStatement returned from getAllEntries
$entries = $entryTable->getAllEntries();
$blogOutput = include_once "views/list-entries-html.php";

return $blogOutput;