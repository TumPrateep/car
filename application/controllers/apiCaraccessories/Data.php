<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('tiredatas');
    }

    function save_tireimport_post(){
        $csvData = $this->post('csvData');
        $data = [];
        foreach ($csvData as $i => $row) {            
            $data[] = array(
                'tire_dataId' => !empty($row[1]) ? $row[1] : '',
                'price' => !empty($row[3]) ? $row[3] : '',
            );
        }

        $result = $this->tiredatas->import($data);

        if ($result) {
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $output["result"] = $result;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_NOT_UPDATE;
            $output["data"] = $data;
            $this->set_response($output, REST_Controller::HTTP_CONFLICT);
        }
    }

}