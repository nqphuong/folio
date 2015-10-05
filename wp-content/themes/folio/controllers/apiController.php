<?php

//Include WP library
require_once(dirname(__FILE__).'/../../../../wp-load.php');

$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
$_params = $_REQUEST;
$_ins = new APIController($_action);
if($_ins->validation()){
    $_ins->run($_params);
}

class APIController{
    private $_action = 'index';
    public function __construct($action){
        $this->_action = $action;
    }
    
    public function run($params){
        $func_name = 'action' . $this->_action;
        $this->$func_name($params);
    }
    
    public function validation(){
        $arr_api = array(
            'index',
            'newsletter'
        );

        if(in_array(strtolower($this->_action), $arr_api)){
            return true;
        }

        return false;
    }
    
    public function actionIndex($params){
        echo 'Index';
    }
    
    public function actionNewsletter($params){
        $addr = isset($params['addr']) ? $params['addr'] : false;

        if($addr){
            add_filter( 'wp_mail_content_type', 'set_html_content_type' );
            $to = 'phuongkps@gmail.com';
            $subject = 'Mr3j.com | Client registration form';
            $body = 'Hi, any body who wants to subscribe your site under email : ' . $addr . '<br />';
            
            wp_mail($to, $subject, $body);
            
            // Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
            remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
            
            echo 1;
        } else {
            echo -1;
        }
    }
}

function set_html_content_type() {
	return 'text/html';
}