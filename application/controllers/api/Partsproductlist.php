<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Partsproductlist extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('partstablelists');
        $this->load->model('partsproducts');
        $this->load->model('partsproductlists');
    }

    function getProductTableList_get()
    {
        $parts_table_id = $this->get('parts_table_id');

        $tablelist = $this->partstablelists->all();
        $products = $this->partsproducts->all();

        $data = [];
        $data['table'] = $tablelist;
        $data['products'] = $products;
        $data['table_product'] = $this->getProductIntable($tablelist, $products);

        $this->set_response($data);
    }

    function getProducts_get()
    {
        $parts_table_id = $this->get('parts_table_id');
        $partId = $this->get('partId');

        $tablelist = $this->partstablelists->getPartsByPartTableId($parts_table_id);
        $products = $this->partsproductlists->getPartTable($partId);

        $data = [];
        $data['list'] = $tablelist;
        $data['products'] = $products;

        $this->set_response($data);
    }

    function getProductIntable($tablelist, $products){
        $data = [];
        foreach ($products as $p) {
            foreach($tablelist as $t){
                $data[$p->partId][$t->parts_table_list_id] = $this->partsproducts->productList($p->partId, $t->parts_table_list_id);
            }
        }
        return $data;
    }

    public function create_post(){
        $partId = $this->post('partId');
        $table_list_id = $this->post('table_list_id');

        $result = $this->partsproductlists->update($partId, $table_list_id);
        
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

    }
}