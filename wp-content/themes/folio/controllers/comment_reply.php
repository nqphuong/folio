<?php

//Include WP library
require_once(dirname(__FILE__).'/../../../../wp-load.php');

$secretKey = "6LdGmwMTAAAAADHKY8dIoX97p9IBoT4kTiAz-AHV";
$reCaptchaValidationSite = 'https://www.google.com/recaptcha/api/siteverify';

if(isset($_POST['object_id']) &&
 isset($_POST['comment_parent_id']) &&
 isset($_POST['author']) &&
 isset($_POST['email']) &&
 isset($_POST['content']) &&
 isset($_POST['captchaRes'])){
 
 $object_id = $_POST['object_id'];
 $comment_parent_id = $_POST['comment_parent_id'];
 $author = $_POST['author'];
 $email = $_POST['email'];
 $content = $_POST['content'];
 $captchaRes = trim($_POST['captchaRes']);
 
 //Verify reCaptcha Validation
 $captcha_valid = wp_remote_get($reCaptchaValidationSite . "?secret=" . $secretKey . "&response=" . $captchaRes, array());
 $captcha_valid = get_object_vars(json_decode($captcha_valid["body"]));
 
 if (isset($captcha_valid['success']) && $captcha_valid['success']) {
  $commentdata = array();
  $commentdata['comment_post_ID'] = $object_id;
  $commentdata['comment_parent'] = $comment_parent_id;
  $commentdata['comment_author'] = $author;
  $commentdata['comment_author_email'] = $email;
  $commentdata['comment_content'] = $content;
  $commentdata['user_ID'] = 0;
  
  $comment_id = wp_new_comment($commentdata);
  if($comment_id){
   //Send notification mail
   add_filter('wp_mail_content_type', 'set_html_content_type');
   $to = "phuongkps@gmail.com";
   $subject = "Mr3j.com | New client comment";
   $body = "Dear Richard, a new comment has been arrived to article with ID={$object_id}. Please read it and enjoy by yourself! Thanks.";
   wp_mail($to, $subject, $body);
   // Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
   remove_filter('wp_mail_content_type', 'set_html_content_type');
   echo $comment_id;
  } else{echo -1;}
 } else {echo -1;}
}