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
        $CI->load->model('basicdata');
        return $CI->basicdata->get();
    }
}

if (!function_exists('htmlSelfData')) {
    function htmlSelfData()
    {
        $basedata = loadBasicData();
        return 'ติดต่อ <a href="tel:' . $basedata->phone . '">' . $basedata->phone . '</a>, อีเมล์ <a href="mailto:' . $basedata->email . '">' . $basedata->email . '</a>, facebook <a href="' . $basedata->facebook . '">CarJaidee Facebook</a>';
    }
}

if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;

        $CI = &get_instance();
        $CI->load->library('email');
        
        $config['protocol'] = 'smtp';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['smtp_host'] = 'smtp.carjaidee.com';
        $config['smtp_port'] = '25';
        $config['smtp_user'] = 'carjaide@carjaidee.com';
        $config['smtp_pass'] = '5Uythv9L97';
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        // $CI = setProtocol();        
        
        $CI->email->from('carjaide@carjaidee.com', 'Carjaidee');
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();

        // var_dump($CI->email->get_debugger_messages());
        
        return $status;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = 'smtp';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['smtp_host'] = 'smtp.thaidata.com';
        $config['smtp_port'] = '25';
        $config['smtp_user'] = 'carjaide';
        $config['smtp_pass'] = '@Carjaidee1!@';
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }

    if(!function_exists('setFlashData'))
    {
        function setFlashData($status, $flashMsg)
        {
            $CI = get_instance();
            $CI->session->set_flashdata($status, $flashMsg);
        }
    }

    if(!function_exists('getHashedPassword'))
    {
        function getHashedPassword($plainPassword)
        {
            return password_hash($plainPassword, PASSWORD_DEFAULT);
        }
    }

}
