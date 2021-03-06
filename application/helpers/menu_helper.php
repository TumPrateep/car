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

  function get_garage(){
    $CI =& get_instance();
    return $CI->session->userdata['logged_in']['garageName'];
  }

  function get_caraccessory(){
    $CI =& get_instance();
    return $CI->session->userdata['logged_in']['car_accessoriesName'];
  }

  function gear_type_dropdown(){
    $CI =& get_instance();
    $CI->load->model("geartypes");

    $gearTypeData = $CI->geartypes->getAllGearType();
                            
    $html = '<select name="gear" id="gear" class="form-control valid" aria-required="true" aria-invalid="false">';
    
    foreach($gearTypeData as $geartype){
        $html .= '<option value="'.$geartype->gearname.'">'.$geartype->gearname.'</option>';
    }

    return $html .= '</select>';

  }

  function get_gear($gear){
    $strGear = ['','น้ำมันเครื่อง','น้ำมันเกียร์ธรรมดา','น้ำมันเกียร์ออโต'];
    if(!empty($gear)){
      return $strGear[$gear];
    }else{
      return '';
    }
  }


}?>