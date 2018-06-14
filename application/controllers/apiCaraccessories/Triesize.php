<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Triesize extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    
    function getAllTireSize_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $tireRimId = $this->post("tireRimId");
        $this->load->model("trieSizes");
        $listTireSize = $this->trieSizes->getAllTireSizeByName($q, $page, $tireRimId);
        $output["items"] = [];
        $nestedData = [];
        if($listTireSize != null){
            foreach ($listTireSize as $row) {
                $nestedData[] =  array(
                    "id" => $row->tire_sizeId,
                    "text" => $row->tire_sizeName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}