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
      if($result == null){
        $result = new stdClass();
        $result->picture = "carimage.png";
      }
      return $result->picture;
    }

    function dd(){
      $CI = get_instance();
      echo $CI->db->last_query();
      exit();
    }

    function getPictureTire($option){
      $CI = get_instance();
      $CI->load->model("dataoption");
      $result = $CI->dataoption->getPictureTire($option);
      if($result == null){
        $result = new stdClass();
        $result->picture = "carimage.png";
      }
      return $result->picture;
    }

    function getPictureLubricator($option){
      $CI = get_instance();
      $CI->load->model("dataoption");
      $result = $CI->dataoption->getPictureLubricator($option);
      if($result == null){
        $result = new stdClass();
        $result->picture = "carimage.png";
      }
      return $result->picture;
    }

    function getCostFromProductDetail($caraccessoryId, $productDetail, $group){
        $data = [];
        if($group == "lubricator"){
            $data = getCostLubricatorForOrderDetail($caraccessoryId, $productDetail);
        }else if($group == "tire"){
            $data = getCostTireForOrderDetail($caraccessoryId, $productDetail);
        }else{
            $data = getCostSpareForOrderDetail($caraccessoryId, $productDetail);
        }
        return $data;
    } 

    function getCostLubricatorForOrderDetail($caraccessoryId, $productDetail){
      $CI = get_instance();
      $CI->load->model("lubricatordatas");
      $result = $CI->lubricatordatas->getCostForOrderDetail($caraccessoryId, $productDetail);
      return $result;
    }

    function getCaracessoryId($orderdetail){
      $CI = get_instance();
      $CI->load->model("orders");
      $arrData['spare'] = [];
      $arrData['tire'] = [];
      $arrData['lubricator'] = [];
      foreach ($orderdetail as $row) {
        $row = (object) $row;
        $arrData[$row->group][] = getDataForOrderDetail($row->productId, $row->group);
      }

      $result = $CI->orders->CheckCar_accessories($arrData);
      return $result;
    }

    function getCostTireForOrderDetail($caraccessoryId, $productDetail){
      $CI = get_instance();
      $CI->load->model("tireproduct");
      $result = $CI->tireproduct->getCostForOrderDetail($caraccessoryId, $productDetail);
      return $result;
    }

    function getCostSpareForOrderDetail($caraccessoryId, $productDetail){
      $CI = get_instance();
      $CI->load->model("Spareundercarriageproduct");
      $result = $CI->Spareundercarriageproduct->getCostForOrderDetail($caraccessoryId, $productDetail);
      return $result;
    }

    function getDataForOrderDetail($productId, $group){
      $data = [];
      if($group == "lubricator"){
          $data = getLubricatorForOrderDetail($productId);
      }else if($group == "tire"){
          $data = getTireDetailForOrderDetail($productId);
      }else{
          $data = getSpareDetailForOrderDetail($productId);
      }
      return $data;
    }

    function getLubricatorForOrderDetail($productId){
      $CI = get_instance();
      $CI->load->model("lubricatordatas");
      $result = $CI->lubricatordatas->getLubricatorIdForOrderDetail($productId);
      return $result->lubricatorId;
    }

    function getTireDetailForOrderDetail($productId){
      $CI = get_instance();
      $CI->load->model("tireproduct");
      $result = $CI->tireproduct->getTireDataForCartById($productId);
      $option = [
        'tire_brandId' => $result->tire_brandId,
        'tire_modelId' => $result->tire_modelId,
        'tire_sizeId' => $result->tire_sizeId,
        'rimId' => $result->rimId
      ];
      return $option;
    }

    function getSpareDetailForOrderDetail($productId){
      $CI = get_instance();
      $CI->load->model("Spareundercarriageproduct");
      $result = $CI->Spareundercarriageproduct->getSpareDataForCartById($productId);
      $option = [
        'spares_undercarriageId' => $result->spares_undercarriageId,
        'spares_brandId' => $result->spares_brandId,
        'brandId' => $result->brandId,
        'modelId' => $result->modelId,
        'modelofcarId' => $result->modelofcarId
      ];
      return $option;
    }

    function getProductDetail($productId, $group){
      $data = [];
      if($group == "lubricator"){
          $data = getLubricatorDetail($productId);
      }else if($group == "tire"){
          $data = getTireDetail($productId);
      }else{
          $data = getSpareDetail($productId);
      }
      return $data;
    }

    function getLubricatorDetail($productId){
      $CI = get_instance();
      $CI->load->model("lubricatorchanges");
      $charge = $CI->lubricatorchanges->getLubricatorChangePrice();
      $CI->load->model("lubricatordatas");
      $result = $CI->lubricatordatas->getLubricatorDataForCartById($productId);
      $result->price = ($result->price*1.1) + $charge->lubricator_price;
      $option = [
        'lubricatorId' => $result->lubricatorId
      ];
      $result->picture = getPictureLubricator($option);
      return $result;
  }


  
  function getTireDetail($productId){
      $CI = get_instance();
      $CI->load->model("tirechanges");
      $tirePriceData = $CI->tirechanges->getTireChangePrice();
      $charge = [];
      foreach($tirePriceData as $cost){
          $charge[$cost->rimId] = $cost->tire_price;
      }
      $CI->load->model("tireproduct");
      $result = $CI->tireproduct->getTireDataForCartById($productId);
      $result->price = ($result->price*1.1) + $charge[$result->rimId];
      $option = [
        'tire_brandId' => $result->tire_brandId,
        'tire_modelId' => $result->tire_modelId,
        'tire_sizeId' => $result->tire_sizeId,
        'rimId' => $result->rimId
      ];
      $result->picture = getPictureTire($option);
      return $result;
  }
  
  function getSpareDetail($productId){
      $CI = get_instance();
      $CI->load->model("sparechanges");
      $sparePriceData = $CI->sparechanges->getSpareChangePrice();
      $charge = [];
      foreach($sparePriceData as $cost){
          $charge[$cost->spares_undercarriageId] = $cost->spares_price;
      }
      $CI->load->model("Spareundercarriageproduct");
      $result = $CI->Spareundercarriageproduct->getSpareDataForCartById($productId);
      $result->price = ($result->price*1.1) + $charge[$result->spares_undercarriageId];
      $option = [
        'spares_undercarriageId' => $result->spares_undercarriageId,
        'spares_brandId' => $result->spares_brandId,
        'brandId' => $result->brandId,
        'modelId' => $result->modelId,
        'modelofcarId' => $result->modelofcarId
      ];
      $result->picture = getPictureSpare($option);
      return $result;
  }

  function getDeliveryCost($caraccessoryId, $cartData){
    $total = 0;
    $number = 0;
    foreach ($cartData as $index => $row) {
      if($row->group == "spare"){
        if($caraccessoryId == null){
          $total += (ceil($row->quantity/3.0) * 50);
        }
        $number += $row->quantity;
      }else if($row->group == "tire"){
        $total += (100*$row->quantity);
      }else{
        $total += 0;
      }
    }
    if($caraccessoryId != null){
      $total += (ceil($number/3.0) * 50);
    }
    return $total;
  }
      
?>