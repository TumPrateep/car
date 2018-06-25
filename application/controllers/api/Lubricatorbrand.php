<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorbrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }
    function searchLubricatorbrand_post(){
            $columns = array( 
                0 => null,
                1 => null, 
                2 =>'lubricator_brandName',
                3 =>'status'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            $this->load->model("Lubricatorbrands");
            $totalData = $this->Lubricatorbrands->allLubricatorbrand_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('tire_brandName')) && empty($this->post('status')))
            {            
                $posts = $this->Lubricatorbrands->allLubricatorbrand($limit,$start,$order,$dir);
            }
            else {
                $search = $this->post('lubricator_brandName');
                $status = $this->post('status');
                $posts =  $this->Lubricatorbrands->lubricatorbrand_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->Lubricatorbrands->lubricatorbrand_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['lubricator_brandId'] = $post->lubricator_brandId;
                    $nestedData['lubricator_brandName'] = $post->lubricator_brandName;
                    $nestedData['lubricator_brandPicture'] = $post->lubricator_brandPicture;
                    $nestedData['status'] = $post->status;
                    $data[] = $nestedData;
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