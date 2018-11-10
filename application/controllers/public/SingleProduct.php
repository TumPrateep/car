<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SingleProduct extends CI_Controller {

    public function solution(){
        $this->load->view("public/menu/solution");
    }

    public function lubricatordetail($productType, $productId){
        $data["group"] = $productType;
        $data["productId"] = $productId;
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/product_style");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/singleproduct/lubricatordetail/content", $data);
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/singleproduct/lubricatordetail/script");
    }

    public function tireorderdetail($productType, $productId){
        $data["group"] = $productType;
        $data["productId"] = $productId;
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/product_style");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/singleproduct/tireorderdetail/content", $data);
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/singleproduct/tireorderdetail/script");
    }
    public function spareordertail($productType, $productId){
        $data["group"] = $productType;
        $data["productId"] = $productId;
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/product_style");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/singleproduct/spareordertail/content", $data);
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/singleproduct/spareordertail/script");
    }
    


    
}