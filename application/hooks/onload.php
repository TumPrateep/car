<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onload{
    public $ci;
    public function __construct(){
        $this->ci=&get_instance();
    }

    public function check_user(){
        $directory = $this->ci->router->directory;
        $controller = $this->ci->router->class;
        $method = $this->ci->router->method;
        if(!isset($this->ci->session->userdata['logged_in'])){
            if($controller != "auth" && $directory != "api"){
                redirect("auth/login");
                exit();
            }
		}
    }
}