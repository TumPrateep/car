<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('load_user_view')) {

    function load_user_view($content, $script = null, $data = [], $loadNew = true)
    {
        $CI = get_instance();
        $CI->load->view('users/layout/head', $data);
        if (isset($CI->session->userdata['logged_in'])) {
            $isUser = $CI->session->userdata['logged_in']['isUser'];

            if (!$isUser) {
                $CI->load->view("users/layout/header");
            } else {
                $data['name'] = $CI->session->userdata['logged_in']['name'];
                $CI->load->view("users/layout/header_user", $data);
            }
        } else {
            $CI->load->view("users/layout/header");
        }
        $CI->load->view('users/layout/menu');
        $CI->load->view($content);
        if($loadNew){
            $CI->load->view('users/layout/news');
        }
        $CI->load->view('users/layout/footer');
        $CI->load->view('users/layout/foot');
        if ($script != null) {
            $CI->load->view($script);
        }
        $CI->load->view('users/layout/end');
    }
}

if (!function_exists('load_user_facebook_view')) {

    function load_user_facebook_view($content, $script = null, $data = [])
    {
        $CI = get_instance();
        $CI->load->view('users/layout-facebook/head', $data);
        if (isset($CI->session->userdata['logged_in'])) {
            $isUser = $CI->session->userdata['logged_in']['isUser'];

            if (!$isUser) {
                $CI->load->view("users/layout-facebook/header");
            } else {
                $data['name'] = $CI->session->userdata['logged_in']['name'];
                $CI->load->view("users/layout-facebook/header_user", $data);
            }
        } else {
            $CI->load->view("users/layout-facebook/header");
        }
        $CI->load->view('users/layout/menu', $data);
        $CI->load->view($content);
        $CI->load->view('users/layout/footer');
        $CI->load->view('users/layout/foot');
        if ($script != null) {
            $CI->load->view($script);
        }
        $CI->load->view('users/layout-facebook/end');
    }
}

if (!function_exists('isUser')) {

    function isUser()
    {
        $CI = get_instance();
        $isUser = false;
        if (isset($CI->session->userdata['logged_in'])) {
            $isUser = $CI->session->userdata['logged_in']['isUser'];
        }

        return $isUser;

    }
}

if (!function_exists('loadBasicData')) {

    function loadBasicData()
    {
        $CI = get_instance();
        return $CI->session->userdata['basic_data'];
    }
}

if (!function_exists('htmlSelfData')) {
    function htmlSelfData()
    {
        $basedata = loadBasicData();
        return 'ติดต่อ <a href="tel:' . $basedata->phone . '">' . $basedata->phone . '</a>, อีเมล์ <a href="mailto:' . $basedata->email . '">' . $basedata->email . '</a>, facebook <a href="' . $basedata->facebook . '">CarJaidee Facebook</a>';
    }
}