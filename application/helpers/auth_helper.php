<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('isUser'))
{
	
	function load_user_view($content, $script = null, $data = [])
	{
        $CI = get_instance();
        $CI->load->view('users/layout/head');
        if(isset($CI->session->userdata['logged_in'])){
			$isUser = $CI->session->userdata['logged_in']['isUser'];
			
			if(!$isUser){
				$CI->load->view("users/layout/header");
			}else{
				$data['name'] = $CI->session->userdata['logged_in']['name'];
				$CI->load->view("users/layout/header_user", $data);
			}
		}else{
			$CI->load->view("users/layout/header");
        }
		$CI->load->view('users/layout/menu', $data);
		$CI->load->view($content);
		$CI->load->view('users/layout/footer');
        $CI->load->view('users/layout/foot');
        if($script != null){
            $CI->load->view($script);
        }
		$CI->load->view('users/layout/end');
	}
}