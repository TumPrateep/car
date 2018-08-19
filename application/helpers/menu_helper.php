<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('active_link')) {
  function activate_menu($str) {
    // Getting CI class instance.
    $CI = get_instance();
    // Getting router class to active.
    $class = $CI->router->fetch_class();
    $method = $CI->router->method;
    $result = "";
    if($method == null || $method == "index"){
        if($class == $str){
            $result = " active";
        }
    }else{
        if($class."/".$method."/" == $str){
            $result = " active";
        }
    }
    return $result;
  }

  function now_user(){
    $CI =& get_instance();
    return $CI->session->userdata['logged_in']['name'];
  }
}?>