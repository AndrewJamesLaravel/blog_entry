<?php

include_once "models/Comment_Table.class.php";
$commentTable = new Comment_Table( $db );

$message = "";

$newCommentSubmitted = isset( $_POST['new-comment'] );
if ( $newCommentSubmitted ) {
    $whichEntry = $_POST['entry-id'];
    $user = $_POST['user-name'];
    $comment = $_POST['new-comment'];
    $commentTable->saveComment( $whichEntry, $user, $comment );
    $message = "Your comment was saved";
}


$comments = include_once "views/comment-form-html.php";

$allComments = $commentTable->getAllById( $entryId );

$comments .= include_once "views/comments-html.php";

/*$testOutput = print_r( $firstComment, true );
die( "<pre>$testOutput</pre>" );*/


return $comments;