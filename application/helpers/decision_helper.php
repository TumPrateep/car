<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH . '/libraries/REST_Controller.php';
    function decision_create($option) {
      $output = [];
      if($option["data_check"] == null){
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

    function decision_update($option) {
      $output = [];
      if($option["data_check_update"] != null){
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
      }else{
        if($option["image_path"] != null){
          unlink($option["image_path"]);
        }
        $output["message"] = REST_Controller::MSG_BE_DELETED;
      }

      return $output;
    }

    function decision_delete($option) {
      $output = [];
      if($option["data_check_delete"] != null){
        $result = $option["model"]->delete($option["data"]);
        if($result){
          if($option["image_path"] != null){
            $option["image_path"];
          }
          $output["message"] = REST_Controller::MSG_SUCCESS;
        }else{
          $output["message"] = REST_Controller::MSG_BE_USED;
        }
      }else{
        $output["message"] = REST_Controller::MSG_BE_DELETED;
      }
      return $output;
    }

    function decision_update_status($option) {
      $output = [];
      if($option["data_check_update"] != null){
        $result = $option["model"]->update($option["data"]);
        if($result){
          $output["message"] = REST_Controller::MSG_SUCCESS;
        }else{
          $output["message"] = REST_Controller::MSG_NOT_UPDATE;
        }
      }else{
        $output["message"] = REST_Controller::MSG_BE_DELETED;
      }

      return $output;
    }

    function decision_getdata($option) {
      $output = [];
      if($option["data_check"] != null){
        $output["data"] = $option["data_check"];
        $output["message"] = REST_Controller::MSG_SUCCESS;
      }else{
        $output["message"] = REST_Controller::MSG_BE_DELETED;
      }

      return $output;
    }
      
?>