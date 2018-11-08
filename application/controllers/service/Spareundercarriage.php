<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spareundercarriageproduct extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model("Sparesundercarriageproduct");
    }
    public function search_post(){
        $column = "spares_undercarriageDataId";
        $sort = "asc";
        if($this->post('column') == 3){
            $column = "status";
        }else if($this->post('column') == 2){
            $sort = "desc";
        }else{
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;

        
        $totalData = $this->spare_undercarriagedatas->allSpareData_count();
        $totalFiltered = $totalData;
        $userId = $this->session->userdata['logged_in']['id'];
        if(empty($this->post('spares_brandId')) && empty($this->post('spares_undercarriageId'))  && empty($this->post('price')) )
        {            
            $posts = $this->spare_undercarriagedatas->allSpareData($limit,$start,$order,$dir,$userId);
        }
        else {
            
            // $spares_brandId = $this->post('spares_brandId');
            // $spares_undercarriageId = $this->post('spares_undercarriageId');
            // $price = $this->post('price');
            
            // $status = null; 
            // $posts =  $this->spare_undercarriagedatas->SpareData_search($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price, $userId);

            // $totalFiltered = $this->spare_undercarriagedatas->SpareDatas_search_count($spares_undercarriageId, $spares_brandId, $price, $userId);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['spares_undercarriageDataId'] = $post->spares_undercarriageDataId;
                $nestedData[$count]['spares_brandName'] = $post->spares_brandName;
                $nestedData[$count]['spares_undercarriageName'] = $post->spares_undercarriageName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['spares_undercarriageDataPicture'] = $post->spares_undercarriageDataPicture;
                $nestedData[$count]['brandName'] = $post->brandName;
                $nestedData[$count]['modelName'] = $post->modelName;
                if($post->yearEnd != null){
                    $nestedData[$count]['year'] = $post->yearStart."-".$post->yearEnd;
                }else{
                    $nestedData[$count]['year'] = $post->yearStart;
                }
                $nestedData[$count]['modelofcarName'] = $post->modelofcarName;
                $nestedData[$count]['machineSize'] = $post->machineSize;
                $data[$index] = $nestedData;
                if($count >= 2){
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }
                
                $count++;

            }
        }

        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );

        $this->set_response($json_data);
    }
}