<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Tirebrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }

    function getAllTireBrand_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $this->load->model("Triebrands");
        $listTireBrand = $this->Triebrands->getAllTireBrandByName($q, $page);
        $output["items"] = [];
        $nestedData = [];
        if($listTireBrand != null){
            foreach ($listTireBrand as $row) {
                $nestedData[] =  array(
                    "id" => $row->tire_brandId,
                    "text" => $row->tire_brandName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}