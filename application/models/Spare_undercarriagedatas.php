<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spare_undercarriagedatas extends CI_Model{
    function allSpareData_count($userId){
        $this->db->where("create_by", $userId);
        $query = $this
                ->db
                ->get('spares_undercarriagedata');
    
        return $query->num_rows();
    }
    function allSpareData($limit,$start,$order,$dir,$userId){
        $this->db->select('spares_undercarriagedata.spares_undercarriageDataId,
        spares_undercarriagedata.status,spares_brand.spares_brandName,
        spares_undercarriage.spares_undercarriageName,spares_undercarriagedata.price,
        spares_undercarriagedata.warranty,spares_undercarriagedata.warranty_distance,
        spares_undercarriagedata.warranty_year,
        spares_undercarriagedata.spares_undercarriageDataPicture,
        brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.machineSize,spares_undercarriage.spares_undercarriageId,
        spares_brand.spares_brandId,brand.brandId,model.modelId,modelofcar.modelofcarId,spares_brand.spares_brandPicture')->select("IFNULL(`detail`, '') AS `detail`", false)->select("IFNULL(`modelofcarName`, '') AS `modelofcarName`", false);

        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
        $this->db->join('brand','brand.brandId = spares_undercarriagedata.brandId');
        $this->db->join('model','model.modelId = spares_undercarriagedata.modelId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = spares_undercarriagedata.modelofcarId');
        
        
        $this->db->where("spares_undercarriagedata.create_by", $userId);

        $query = $this->db->limit($limit,$start)->order_by($order,$dir)->get();
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }else{
            return null;
        }
    }

    function SpareData_search($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price, $userId){
        $price = explode(",",$price);
        $this->db->select('spares_undercarriagedata.spares_undercarriageDataId,
        spares_undercarriagedata.status,spares_brand.spares_brandName,
        spares_undercarriage.spares_undercarriageName,spares_undercarriagedata.price,
        spares_undercarriagedata.warranty,spares_undercarriagedata.warranty_distance,
        spares_undercarriagedata.warranty_year,
        spares_undercarriagedata.spares_undercarriageDataPicture,
        brand.brandName,model.modelName,model.yearStart,model.yearEnd,
        modelofcar.modelofcarName,modelofcar.machineSize,spares_undercarriage.spares_undercarriageId,
        spares_brand.spares_brandId,brand.brandId,model.modelId,modelofcar.modelofcarId,spares_brand.spares_brandPicture');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
        $this->db->like('spares_undercarriagedata.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriagedata.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriagedata.price >=',$price[0]);
        $this->db->where('spares_undercarriagedata.price <=',$price[1]);
        $this->db->where("spares_undercarriagedata.create_by", $userId);

        if($status != null){
            $this->db->where("spares_undercarriagedata.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($order,$dir)
                ->get();
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function SpareDatas_search_count($spares_undercarriageId, $spares_brandId, $price, $userId){
        $price = explode(",",$price);
        $this->db->select('spares_undercarriagedata.spares_undercarriageDataId,
        spares_undercarriagedata.status,spares_brand.spares_brandName,
        spares_undercarriage.spares_undercarriageName,spares_undercarriagedata.price,
        spares_undercarriagedata.warranty,spares_undercarriagedata.warranty_distance,
        spares_undercarriagedata.warranty_year,
        spares_undercarriagedata.spares_undercarriageDataPicture,
        brand.brandName,model.modelName,model.yearStart,model.yearEnd,
        modelofcar.modelofcarName,modelofcar.machineSize,spares_undercarriage.spares_undercarriageId,
        spares_brand.spares_brandId,brand.brandId,model.modelId,modelofcar.modelofcarId,spares_brand.spares_brandPicture');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
        $this->db->like('spares_undercarriagedata.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriagedata.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriagedata.price >=',$price[0]);
        $this->db->where('spares_undercarriagedata.price <=',$price[1]);
        $this->db->where("spares_undercarriagedata.create_by", $userId);
        
        if($status != null){
            $this->db->where("spares_undercarriagedata.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        return $query->num_rows();   
    }
    function data_check_create($spares_brandId,$spares_undercarriageId,$brandId,$modelId,$modelofcarId,$userId){
        $this->db->from('spares_undercarriagedata');
        $this->db->where('spares_undercarriagedata.spares_brandId',$spares_brandId);
        $this->db->where('brandId', $brandId);
        $this->db->where('modelId', $modelId);
        $this->db->where('modelofcarId', $modelofcarId);
        $this->db->where('spares_undercarriagedata.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriagedata.create_by',$userId);
        $result = $this->db->get();
        return $result->row();
    }
    function insert($data){
        $this->db->trans_begin();
            foreach ($data["spares_undercarriageId"] as $key => $sparesId) {
                foreach ($data["modelofcarId"] as $val) {
                    $spareData = $data["model"];
                    $modelOfCarData = $this->db->where("modelofcarId",$val)->get("modelofcar")->row();
                    $spareData["modelId"] = $modelOfCarData->modelId;
                    $spareData["modelofcarId"] = $val;
                    $spareData["machineSize"] = $modelOfCarData->machineSize;
                    $spareData["spares_undercarriageId"] = $sparesId;
                    $spareData["price"] = $data["price"][$key];
                    $spareData["warranty"] = $data["warranty"][$key];
                    $spareData["warranty_year"] = $data["warranty_year"][$key];
                    $spareData["warranty_distance"] = $data["warranty_distance"][$key];

                    $isTrue = $this->data_check_create($spareData["spares_brandId"],$spareData["spares_undercarriageId"],$spareData["brandId"],$spareData["modelId"],$spareData["modelofcarId"],$spareData["create_by"]);
                    if(!$isTrue){
                        $this->db->insert('spares_undercarriagedata',$spareData);
                    }
                } 
            }
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
    function data_check_update($spares_brandId,$spares_undercarriageId,$brandId,$modelId,$modelofcarId,$userId,$spares_undercarriageDataId){
        $this->db->from('spares_undercarriagedata');
        $this->db->where('brandId', $brandId);
        $this->db->where('modelId', $modelId);
        $this->db->where('modelofcarId', $modelofcarId);
        $this->db->where('spares_undercarriagedata.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriagedata.create_by',$userId);
        $this->db->where_not_in('spares_undercarriagedata.spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->get();
        return $result->row();
    }
    function checkStatus($userId,$spares_undercarriageDataId){
        $this->db->from('spares_undercarriagedata');
        $this->db->where('spares_undercarriagedata.create_by',$userId);
        $this->db->where('spares_undercarriagedata.spares_undercarriageDataId',$spares_undercarriageDataId);
        $this->db->where('spares_undercarriagedata.status',2);
        $this->db->where('spares_undercarriagedata.activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
            return true;
    }
    function update($data){
        $this->db->where('spares_undercarriageDataId',$data['spares_undercarriageDataId']);
        $result = $this->db->update('spares_undercarriagedata', $data);
        return $result;
    }
    function getspares_undercarriageDatabyId($spares_undercarriageDataId){
        return $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId)->get("spares_undercarriagedata")->row();
    }

    function checkSpareUndercarriageData($spares_undercarriageDataId) {
        $this->db->from('spares_undercarriagedata');
        $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }

    function getupdate($spares_undercarriageDataId){
        $this->db->select("price,spares_brandId,spares_undercarriageDataId,spares_undercarriageDataPicture,spares_undercarriageId,status,warranty,warranty_distance,warranty_year,modelId,brandId,modelofcarId,machineSize");
        $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->get('spares_undercarriagedata')->row();
        return $result;
    }
    function delete($spares_undercarriageDataId){
        return $this->db->delete('spares_undercarriagedata',array('spares_undercarriageDataId' => $spares_undercarriageDataId));
    }

    function getSpareDatasById($spares_undercarriageDataId){
        return $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId)->get("spares_undercarriagedata")->row();
    }

    function getSpareDataForCartByIdArray($spares_undercarriageDataIdArray){
        if($spares_undercarriageDataIdArray == null){
            return null;
        }
        $this->db->select('spares_brand.spares_brandId,brand.brandId,model.modelId,modelofcar.modelofcarId,spares_undercarriagedata.spares_undercarriageDataId,spares_undercarriage.spares_undercarriageId,spares_undercarriagedata.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriagedata.price,spares_undercarriagedata.warranty,spares_undercarriagedata.warranty_distance,spares_undercarriagedata.warranty_year,spares_undercarriagedata.spares_undercarriageDataPicture,brand.brandName,model.modelName,concat(model.yearStart,"-",model.yearEnd) as year,modelofcar.modelofcarName,modelofcar.machineSize');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = spares_undercarriagedata.modelofcarId');
        $this->db->join('brand','brand.brandId = spares_undercarriagedata.brandId');
        $this->db->join('model','model.modelId = spares_undercarriagedata.modelId');
        $this->db->where_in('spares_undercarriageDataId',$spares_undercarriageDataIdArray);
        $result = $this->db->get();
        if($result->num_rows()>0){
            return $result->result();  
        }else{
            return null;
        }
    }

    function getSpareDataForOrderByIdArray($spares_undercarriageDataIdArray, $orderId = null, $group){
        if($spares_undercarriageDataIdArray == null){
            return null;
        }
        $this->db->select('spares_undercarriagedata.spares_undercarriageDataId as productId,spares_undercarriage.spares_undercarriageId,spares_undercarriagedata.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriagedata.warranty,spares_undercarriagedata.warranty_distance,spares_undercarriagedata.warranty_year,spares_undercarriagedata.spares_undercarriageDataPicture,brand.brandName,model.modelName,concat(model.yearStart,"-",model.yearEnd) as year,modelofcar.modelofcarName,modelofcar.machineSize, orderdetail.quantity, spares_undercarriagedata.spares_undercarriageDataPicture as picture, orderdetail.cost, orderdetail.charge, spares_brand.spares_brandId, brand.brandId, model.modelId, modelofcar.modelofcarId');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('orderdetail','orderdetail.productId = spares_undercarriagedata.spares_undercarriageDataId');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = spares_undercarriagedata.modelofcarId');
        $this->db->join('brand','brand.brandId = spares_undercarriagedata.brandId');
        $this->db->join('model','model.modelId = spares_undercarriagedata.modelId');
        $this->db->where_in('spares_undercarriageDataId',$spares_undercarriageDataIdArray);
        $this->db->where('orderdetail.group', $group);
        if($orderId != null){
            $this->db->where_in("orderdetail.orderId", $orderId);
        }
        $result = $this->db->get();
        
        if($result->num_rows()>0){
            return $result->result();  
        }else{
            return null;
        }
    }

    
}