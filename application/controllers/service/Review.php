<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();  
        $this->load->model('commentusers');

    }

    function getdatarating_post(){
        $garageId = $this->post('garageId');
        $data["review"] = $this->commentusers->getDataReviewForRating($garageId);

        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function searchScoreRating_get(){
        
        $garageId = $this->get('garageId');
        $score['all'] = $this->commentusers->allScoreAll_count($garageId);
        $score['sum'] = $this->commentusers->allSumScore($garageId);
       
        $this->set_response($score, REST_Controller::HTTP_OK);
    }

}