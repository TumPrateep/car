<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarSpareUndercarriage extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }
    function searchspareUndercarriage_post(){
        $columns = array( 
            0 => null
        );
            
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("sparesUndercarriages");
        $totalData = $this->sparesUndercarriages->allsparesUndercarriages_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('spares_undercarriageName')))
        {            
            $posts = $this->sparesUndercarriages->allsparesUndercarriage($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('spares_undercarriageName'); 
            $status = 1; 

            $posts =  $this->sparesUndercarriages->sparesUndercarriage_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->sparesUndercarriages->sparesUndercarriage_search_count($search,$status);
        }

        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData[$count]['spares_undercarriageId'] = $post->spares_undercarriageId;
                $nestedData[$count]['spares_undercarriageName'] = $post->spares_undercarriageName;
                $nestedData[$count]['status'] = $post->status;

                
                $data[$index] = $nestedData;
                if($count >= 3){
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