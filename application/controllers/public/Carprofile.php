<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carprofile extends CI_Controller {

    public function solution(){
        $this->load->view("public/menu/solution");
    }
    function __construct()
    {
        parent::__construct();
        $this->load->view("lib");
    }

    public function index(){

        // $userId = $this->session->userdata['logged_in']['id'];
        // $data['user_profile'] = $this->userprofiles->getUserProfileByUserId($userId);
    
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
        $this->load->view("public/carprofile/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/carprofile/script");

        // $this->load->view("public/layout/head");
		// $this->load->view("public/layout/product_style");
        // $this->load->view("public/layout/header_login");
        // $this->load->view("public/layout/wishlist");
        // $this->load->view("public/layout/menu");
        // $this->load->view("public/carprofile/content");
        // $this->load->view("public/layout/copyright");        
        // $this->load->view("public/layout/foot");
        // $this->load->view("public/carprofile/script");
    }

    public function create()
    {

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
        $this->load->view("public/carprofile/create/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/carprofile/create/script");

        // $this->load->view("public/layout/head");
        // $this->load->view("public/layout/head_shop");
        // $this->load->view("public/layout/header");
        // $this->load->view("public/layout/wishlist");
        // $this->load->view("public/layout/menu");
        // $this->load->view("public/carprofile/create/content");
        // $this->load->view("public/layout/copyright");        
        // $this->load->view("public/layout/foot");
        // $this->load->view("public/carprofile/create/script");
    }

    public function update($car_profileId)
    {
        $data["car_profileId"] = $car_profileId;

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
        $this->load->view("public/carprofile/update/content", $data);
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/carprofile/update/script");
        
        // $this->load->view("public/layout/head");
        // $this->load->view("public/layout/head_shop");
        // $this->load->view("public/layout/header");
        // $this->load->view("public/layout/wishlist");
        // $this->load->view("public/layout/menu");
        // $this->load->view("public/carprofile/update/content", $data);
        // $this->load->view("public/layout/copyright");        
        // $this->load->view("public/layout/foot");
        // $this->load->view("public/carprofile/update/script");
    }

    
}