<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH . '/libraries/REST_Controller.php';
    function user_decision_create($option) {
      $output = [];
      if($option["data_check"] == null){
        $option["data"]["activeFlag"] = 2;
        $result = $option["model"]->insert($option["data"]);
        if($result){
          $output["message"] = REST_Controller::MSG_SUCCESS;
        }else{
          $output["message"] = REST_Controller::MSG_NOT_CREATE;
          if($option["image_path"] != null){
            unlink($option["image_path"]);
          }
        }
      }else{
        $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
        if($option["image_path"] != null){
          unlink($option["image_path"]);
        }
      }

      return $output;
    }

    function user_decision_update($option) {
      $output = [];
      if($option["data_check_update"] != null){
        if($option["data_check_update"]->activeFlag == 1){
          $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
        }else{
          if($option["data_check"] == null){
            $result = $option["model"]->update($option["data"]);
            if($result){
              if($option["old_image_path"] != null){
                unlink($option["old_image_path"]);
              }
              $output["message"] = REST_Controller::MSG_SUCCESS;
            }else{
              if($option["image_path"] != null){
                unlink($option["image_path"]);
              }
              $output["message"] = REST_Controller::MSG_NOT_UPDATE;
            }
          }else{
            if($option["image_path"] != null){
              unlink($option["image_path"]);
            }
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
          }
        }
      }else{
        if($option["image_path"] != null){
          unlink($option["image_path"]);
        }
        $output["message"] = REST_Controller::MSG_BE_DELETED;
      }

      return $output;
    }

    function user_decision_delete($option) {
      $output = [];
      if($option["data_check_delete"] != null){
        if($option["data_check_delete"]->activeFlag == 1){
          $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
        }else{
          $result = $option["model"]->delete($option["data"]);
          if($result){
            if($option["image_path"] != null){
              unlink($option["image_path"]);
            }
            $output["message"] = REST_Controller::MSG_SUCCESS;
          }else{
            $output["message"] = REST_Controller::MSG_BE_USED;
          }
        }
      }else{
        $output["message"] = REST_Controller::MSG_BE_DELETED;
      }
      return $output;
    }

    function user_decision_update_status($option) {
      $output = [];
      if($option["data_check_update"] != null){
        if($option["data_check_update"]->activeFlag == 1){
          $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
        }else{
          $result = $option["model"]->update($option["data"]);
          if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
          }else{
            $output["message"] = REST_Controller::MSG_NOT_UPDATE;
          }
        }
      }else{
        $output["message"] = REST_Controller::MSG_BE_DELETED;
      }

      return $output;
    }

    function user_decision_getdata($option) {
      $output = [];
      if($option["data_check"] != null){
        if($option["data_check"]->activeFlag == 1){
          $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
        }else{
          $output["data"] = $option["data_check"];
          $output["message"] = REST_Controller::MSG_SUCCESS;
        }
      }else{
        $output["message"] = REST_Controller::MSG_BE_DELETED;
      }

      return $output;
    }

    function getPictureSpare($option){
      $CI = get_instance();
      // example
      // $option = [
      //   'spares_undercarriageId' => '',
      //   'spares_brandId' => '',
      //   'brandId' => '',
      //   'modelId' => '',
      //   'modelofcarId' => ''
      // ];
      $CI->load->model("dataoption");
      $result = $CI->dataoption->getPictureSpare($option);
      if($result->picture == null){
        $result->picture = "carimage.png";
      }
      return $result->picture;
    }

    function getPictureTire($option){
      $CI = get_instance();
      $CI->load->model("dataoption");
      $result = $CI->dataoption->getPictureTire($option);
      if($result->picture == null){
        $result->picture = "carimage.png";
      }
      return $result->picture;
    }

    function getPictureLubricator($option){
      $CI = get_instance();
      $CI->load->model("dataoption");
      $result = $CI->dataoption->getPictureLubricator($option);
      if($result->picture == null){
        $result->picture = "carimage.png";
      }
      return $result->picture;
    }
      
?>