<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Onload
{
    public $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function check_user()
    {
        $directory = $this->ci->router->directory;
        $controller = $this->ci->router->class;
        $method = $this->ci->router->method;

        if (empty($this->ci->session->userdata['basic_data'])) {
            $this->ci->load->model('basicdata');
            $sess_array = $this->ci->basicdata->get();
            $this->ci->session->set_userdata('basic_data', $sess_array);
        }

        if (empty($this->ci->session->userdata['logged_in'])) {
            if (
                // $controller != "auth" &&
                $directory != "public/" && $directory != "api/" && $directory != "service/" && $controller != "main"
                && $directory != "user/" // &&
                // $directory != "apiCaraccessories/"
            ) {
                redirect("/");
                exit();
            }
        } else {
            //     if($directory != "api/" && $directory != "apiCaraccessories/" && $controller != "role" && $controller != "auth"){
            //         $role = $this->ci->session->userdata['logged_in']['role'];
            //         if($role == 1){
            //             if($directory != "admin/"){
            //                 redirect("role");
            //             }
            //         }else if($role == 3){
            //             if($directory != "garage/"){
            //                 redirect("role");
            //             }
            //         }else if($role == 2){
            //             if($directory != "caraccessory/"){
            //                 redirect("role");
            //             }
            //         }else if($role == 4){
            //             if($directory != "user/"){
            //                 redirect("role");
            //             }
            //         }
            //     }
        }
    }
}