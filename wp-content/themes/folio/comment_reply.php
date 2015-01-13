<?php

//Include WP library
require_once(dirname(__FILE__).'/../../../wp-load.php');

if(isset($_POST['object_id']) &&
   isset($_POST['comment_parent_id']) &&
   isset($_POST['author']) &&
   isset($_POST['email']) &&
   isset($_POST['content'])){
    
    $object_id = $_POST['object_id'];
    $comment_parent_id = $_POST['comment_parent_id'];
    $author = $_POST['author'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    
    $commentdata = array();
    $commentdata['comment_post_ID'] = $object_id;
    $commentdata['comment_parent'] = $comment_parent_id;
    $commentdata['comment_author'] = $author;
    $commentdata['comment_author_email'] = $email;
    $commentdata['comment_content'] = $content;
    $commentdata['user_ID'] = 0;
    
    $comment_id = wp_new_comment($commentdata);
    if($comment_id)
        echo $comment_id;
    else
        echo -1;
}