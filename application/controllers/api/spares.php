<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class spares extends BD_Controller {
    function searchspares_post(){
        $columns = array( 
            0 => null,
            1 => 'sparesName', 
            
            
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("spares");
        $totalData = $this->spares->allSpares_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('sparesName')))
        {            
            $posts = $this->spares->allSpares($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('sparesName'); 

            $posts =  $this->spares->spare_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->spares->spare_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['sparesbrandId'] = $post->sparesbrandId;
                $nestedData['sparesbrandName'] = $post->sparesbrandName;

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
