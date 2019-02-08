<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spareproduct extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("spareproductdata");
	}
	
	function search_post(){
		$columns = array( 
            0 => null,
            1 => null,
            2 => 'spares_undercarriage.spares_undercarriageId', 
            3 => 'spares_brand.spares_brandId',
			4 => 'name',
			5 => 'spare_product.status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->spareproductdata->allData_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('status')))
        {            
            $posts = $this->spareproductdata->allData($limit,$start,$order,$dir);
        } else {
        //     $search = $this->post('brandName'); 
        //     $status = $this->post('status'); 

        //     $posts =  $this->brand->brand_search($limit,$start,$search,$order,$dir,$status);

        //     $totalFiltered = $this->brand->brand_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['productId'] = $post->productId;
                $nestedData['name'] = $post->name;
                $nestedData['status'] = $post->status;
                $nestedData['picture'] = $post->picture;
                $nestedData['yearStart'] = $post->yearStart;
                $nestedData['yearEnd'] = $post->yearEnd;
                $nestedData['machineSize'] = $post->machineSize;
                $nestedData['modelofcarName'] = $post->modelofcarName;
                $nestedData['spares_undercarriageName'] = $post->spares_undercarriageName;
                $nestedData['spares_brandName'] = $post->spares_brandName;

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
    
    function create_post(){
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        $spares_brandId = $this->post("spares_brandId");
        $brandId = $this->post("brandId");
        $modelId = $this->post("detail");
        $modelofcarId = $this->post("modelofcarId");

        $userId = $this->session->userdata['logged_in']['id'];
        $config['upload_path'] = 'public/image/spareproduct/';
        $img = $this->post("picture");
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);

        if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}else{
            $data_check = $this->spareproductdata->data_check_create($spares_undercarriageId,$spares_brandId,$brandId,$modelId,$modelofcarId);
            $data = array(
                "spares_undercarriageId"=> $spares_undercarriageId,
                "spares_brandId"=> $spares_brandId,
                "brandId"=> $brandId,
                "modelId"=> $modelId,
                "modelofcarId"=> $modelofcarId,
                "picture" => $imageName,
                "status"=> 1,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->spareproductdata,
                "image_path" => $file
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }

    }

    function changeStatus_post(){
        $productId = $this->post("productId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->spareproductdata->getProductDataById($productId);
        $data = array(
            'productId' => $productId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->spareproductdata
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_post(){
        $productId = $this->post('productId');
        $data_check = $this->spareproductdata->getUpdate($productId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $this->load->model("spareproductdata");
        $productId = $this->post('productId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $spares_brandId = $this->post('spares_brandId');
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $modelofcarId = $this->post('modelofcarId');
        $config['upload_path'] = 'public/image/spareproduct/';
        $img = $this->post("picture");
        
        $file = null;
        $success = true;
        $imageName = null;
        $userId = $this->session->userdata['logged_in']['id'];
        if(!empty($img)){
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $imageName = uniqid().'.png';
            $file = $config['upload_path']. '/'. $imageName;
            $success = file_put_contents($file, $data);
        }
        if (!$success){
            unlink($file);
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $data_check_update = $this->spareproductdata->getSpareById($productId);
            $data_check = $this->spareproductdata->data_check_update($productId,$spares_undercarriageId);

            $data = array(
                'productId' => $productId,
                'spares_undercarriageId'  => $spares_undercarriageId,
                'spares_brandId'  => $spares_brandId,
                'brandId'  => $brandId,
                'modelId'  => $modelId,
                'modelofcarId'  => $modelofcarId,
                'picture'  =>  $imageName,
                'update_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time())
            );
            $oldImage = null;
            if($data_check_update != null){
                $oldImage = $config['upload_path'].$data_check_update->picture;
            }

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->spareproductdata,
                "image_path" => $file,
                "old_image_path" => $oldImage,
            ];

            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }

    public function delete_get(){
        $productId = $this->get('productId');
        $data_check = $this->spareproductdata->getProductDataById($productId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $productId,
            "model" => $this->spareproductdata,
            "image_path" => 'public/image/spareproduct/'.$data_check->picture
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    
}
