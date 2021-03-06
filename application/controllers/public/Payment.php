<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {


    public function Payments($paymentId)
    {
        $data['orderId']=$paymentId;
        $this->load->view("public/layout/head");
		$this->load->view("public/layout/head_shop");
		if(isset($this->session->userdata['logged_in'])){
			$isUser = $this->session->userdata['logged_in']['isUser'];
			if(!$isUser){
				$this->load->view("public/layout/header");
			}else{
				$this->load->view("public/layout/header_login");
			}
		}else{
            $this->load->view("public/layout/header");
            
            
		}
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/payment/content",$data);
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/payment/script");
    }

}