<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function solution(){
        $this->load->view("public/menu/solution");
    }

    public function tire(){
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
        $this->load->view("public/shop/tire/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/shop/tire/script");
    }

    public function lubricator(){
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
        $this->load->view("public/shop/lubricator/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/shop/lubricator/script");
    }

    public function sparepart(){
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
        $this->load->view("public/shop/sparepart/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/shop/sparepart/script");
    }

    public function showshop(){
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
        $this->load->view("public/shop/showshop/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        // $this->load->view("public/shop/sparepart/script");
    }

    public function searchgarage(){
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
        $this->load->view("public/menu/searchgarage/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        // $this->load->view("public/shop/sparepart/script");
    }

    public function Cart(){
        $this->load->view("public/layout/head");
		$this->load->view("public/layout/head_cart");
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
        $this->load->view("public/shop/cart/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/shop/cart/script");
    }

    public function selectgarage(){
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
        $this->load->view("public/selectgarage/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/selectgarage/script");
    }

}