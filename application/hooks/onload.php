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
            if($controller != "auth" && $directory != "api/"){
                redirect("auth/login");
                exit();
            }
		}else{
            if($directory != "api/" && $controller != "role" && $controller != "auth"){
                $role = $this->ci->session->userdata['logged_in']['role'];

                if($role == 1){
                    if($directory != "admin/"){
                        redirect("role");
                    }
                }else if($role == 2){
                    if($directory != "garage/"){
                        redirect("role");
                    }
                }else if($role == 3){
                    if($directory != "caraccessory/"){
                        redirect("role");
                    }
                }else if($role == 4){
                    if($directory != "user/"){
                        redirect("role");
                    }
                }
            }
        }
    }
}