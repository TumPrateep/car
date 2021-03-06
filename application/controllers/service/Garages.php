<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Garages extends BD_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("searchgarages");
        $this->load->model("garage");
        $this->load->model("commentusers");
    }

    public function getAllGarage_get()
    {
        $data = $this->garage->getAllGarage();
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function getAllGarage_post()
    {
        $dataType = $this->post("dataType");
        $data = $this->garage->getAllGarageByDataType($dataType);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function searchgarage_post()
    {

        // $columns = array(
        //     0 => 'garageName'
        // );
        $latitude = $this->post('latitude');
        $longitude = $this->post('longitude');
        // $dataType = $this->post("dataType");

        $column = "garageName";
        $sort = "asc";
        if ($this->post('sort') == 2) {
            $sort = "desc";
        } else if ($this->post('sort') == 3) {
            $column = "distance";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        $totalData = $this->searchgarages->allgarage_count($latitude, $longitude);
        $totalFiltered = $totalData;

        if (empty($this->post('garagename')) && empty($this->post('provinceIdSearch')) && empty($this->post('districtIdSearch')) && empty($this->post('brandId')) && empty($this->post('service'))) {
            $posts = $this->searchgarages->allgarage($limit, $start, $order, $dir, $latitude, $longitude);
            // dd();
        } else {
            $garageName = $this->post('garagename');
            $provinceId = $this->post('provinceIdSearch');
            $districtId = $this->post('districtIdSearch');
            $subdistrictId = $this->post('subdistrictIdSearch');
            $brandId = $this->post('brandId');
            $service = $this->post('service');
            $posts = $this->searchgarages->garage_search($limit, $start, $order, $dir, $garageName, $provinceId, $districtId, $brandId, $service, $latitude, $longitude);
            $totalFiltered = $this->searchgarages->garage_search_count($garageName, $provinceId, $districtId, $brandId, $service, $latitude, $longitude);
        }
        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {

                $nestedData[$count]['garageId'] = $post->garageId;
                $nestedData[$count]['garageName'] = $post->garageName;
                $nestedData[$count]['phone'] = $post->phone;
                $nestedData[$count]['dayopenhour'] = $post->dayopenhour;
                $nestedData[$count]['openingtime'] = $post->openingtime;
                $nestedData[$count]['closingtime'] = $post->closingtime;
                // $nestedData[$count]['opentime'] = $post->openingtime." - ".$post->closingtime." น.";
                $summuryscore = $this->getallsumscoreratingbygarageId($post->garageId);
                ($summuryscore->scorerating == null) ? $nestedData[$count]['scoresummury'] = 0 : $nestedData[$count]['scoresummury'] = (int) $summuryscore->scorerating;
                $nestedData[$count]['scoreall'] = $this->getcountscoreratingbygarageId($post->garageId);
                $nestedData[$count]['picture'] = $post->picture;
                $nestedData[$count]['garageService'] = $post->garageService;
                $nestedData[$count]['option1'] = $post->option1;
                $nestedData[$count]['option2'] = $post->option2;
                $nestedData[$count]['option3'] = $post->option3;
                $nestedData[$count]['option4'] = $post->option4;
                $nestedData[$count]['latitude'] = (float) $post->latitude;
                $nestedData[$count]['longitude'] = (float) $post->longtitude;
                $nestedData[$count]['service_option1'] = $post->service_option1;
                $nestedData[$count]['service_option1_price'] = $post->service_option1_price;
                $nestedData[$count]['service_option2'] = $post->service_option2;
                $nestedData[$count]['service_option3'] = $post->service_option3;
                if (!empty($post->distance)) {
                    $nestedData[$count]['distance'] = (float) $post->distance;
                }
                $data[$index] = $nestedData;
                if ($count >= 3) {
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }

                $count++;

            }
        }
        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        $this->set_response($json_data);
    }

    public function getgarage_post()
    {
        $mechanicId = $this->post('garageId');
        $data_check = $this->Searchgarages->getgarageById($garageId);
        $option = [
            "data_check" => $data_check,
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function commentandreview_get()
    {
        $garageId = $this->get("garageId");
        $score['all'] = $this->commentusers->allScoreAll_count($garageId);
        $score['one'] = $this->commentusers->allScoreOne_count($garageId);
        $score['two'] = $this->commentusers->allScoreTwo_count($garageId);
        $score['three'] = $this->commentusers->allScoreThree_count($garageId);
        $score['four'] = $this->commentusers->allScoreFour_count($garageId);
        $score['five'] = $this->commentusers->allScorefive_count($garageId);

        $this->set_response($score, REST_Controller::HTTP_OK);
    }

    public function getdatacommentgarage_get()
    {
        $garageId = $this->get("garageId");
        $data["review"] = $this->commentusers->getDataReviewForRating($garageId);

        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function getdatagarageprofile_get()
    {
        $garageId = $this->get("garageId");
        $data["garage"] = $this->garage->getGarageporfile($garageId);

        $date = date_create($data["garage"]->openingtime);
        $data["garage"]->openingtime = date_format($date, "H:i");

        $date = date_create($data["garage"]->closingtime);
        $data["garage"]->closingtime = date_format($date, "H:i");

        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function getallsumscoreratingbygarageId($garageId)
    {
        $data = $this->commentusers->allScoresearchgarage_sum($garageId);
        return $data;
    }

    public function getcountscoreratingbygarageId($garageId)
    {
        $data = $this->commentusers->allScoresearchgarage_count($garageId);
        return $data;
    }

    public function getGarageById_get()
    {
        $garageId = $this->get('garageId');
        $data['garage'] = $this->garage->getGarageByGarageId($garageId);
        $data['owner'] = $this->garage->getOwnerById($garageId);
        $data['rating'] = $this->garage->getRatingByGarageId($garageId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }
}