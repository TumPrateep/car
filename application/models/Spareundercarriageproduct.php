<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spareundercarriageproduct extends CI_Model{

    function allSpareData_count(){
        $this->db->from('spares_undercarriagedata');
        $this->db->where('`spares_undercarriagedata`.`spares_undercarriageDataId` IN (SELECT (SELECT `spares_undercarriageDataId` FROM `spares_undercarriagedata` `rd` WHERE `spares_undercarriageId` = `re`.`spares_undercarriageId` ORDER BY `price` DESC LIMIT 1) as `spares_undercarriageDataId` FROM `spares_undercarriagedata` `re` GROUP BY `spares_undercarriageId`)', NULL, FALSE);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function allSpareData($limit,$start,$order,$dir){
        // $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_undercarriage.spares_undercarriageId,spares_undercarriageData.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.warranty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warranty_year,spares_undercarriageData.spares_undercarriageDataPicture,brand.brandName,model.modelName,model.yearStart,model.yearEnd,spares_brand.spares_brandPicture, spares_undercarriageData.price');
        $this->db->from('spares_undercarriagedata');
        $this->db->where('`spares_undercarriagedata`.`spares_undercarriageDataId` IN (SELECT (SELECT `spares_undercarriageDataId` FROM `spares_undercarriagedata` `rd` WHERE `spares_undercarriageId` = `re`.`spares_undercarriageId` ORDER BY `price` DESC LIMIT 1) as `spares_undercarriageDataId` FROM `spares_undercarriagedata` `re` GROUP BY `spares_undercarriageId`)', NULL, FALSE);
        // $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        // $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        // $this->db->join('brand','brand.brandId = spares_undercarriageData.brandId');
        // $this->db->join('model','model.modelId = spares_undercarriageData.modelId');
        // $this->db->join('modelofcar','modelofcar.modelofcarId = spares_undercarriageData.modelofcarId');
        
        $query = $this->db->limit($limit,$start)->group_by("spares_undercarriage.spares_undercarriageId, spares_brand.spares_brandName")->order_by($order,$dir)->get();
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }else{
            return null;
        }
    }
    //แบบที่ถูก
    function SpareData_search($limit,$start,$order,$dir,$spares_undercarriageId, $spares_brandId, $price,$modelId,$brandId,$year,$can_change){
        $price = explode("-",$price);
        
        $this->db->select('spares_undercarriagedata.spares_undercarriageDataId,spares_undercarriage.spares_undercarriageId,spares_undercarriagedata.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriagedata.warranty,spares_undercarriagedata.warranty_distance,spares_undercarriagedata.warranty_year,spares_undercarriagedata.spares_undercarriageDataPicture,brand.brandName,model.modelName,model.yearStart,model.yearEnd,spares_brand.spares_brandPicture, spares_undercarriagedata.price,
        spares_brand.spares_brandId,brand.brandId,model.modelId,modelofcar.modelofcarId,modelofcar.modelofcarName,modelofcar.machineSize');
        $this->db->from('spares_undercarriagedata');
        $this->db->where('`spares_undercarriagedata`.`spares_undercarriageDataId` IN (SELECT (SELECT `spares_undercarriageDataId` FROM `spares_undercarriagedata` `rd` WHERE `spares_undercarriageId` = `re`.`spares_undercarriageId` and `spares_brandId` = `re`.`spares_brandId` and `modelId` = `re`.`modelId` and `brandId` = `re`.`brandId` and `modelofcarId` = `re`.`modelofcarId` ORDER BY `price` DESC LIMIT 1) as `spares_undercarriageDataId` FROM `spares_undercarriagedata` `re` GROUP BY `spares_undercarriageId`, `spares_brandId`, `modelId`, `brandId`, `modelofcarId`)', NULL, FALSE);
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
        $this->db->join('brand','brand.brandId = spares_undercarriagedata.brandId');
        $this->db->join('model','model.modelId = spares_undercarriagedata.modelId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = spares_undercarriagedata.modelofcarId');
       
        if($year != null){
            $this->db->group_start();
            $this->db->group_start();
                $this->db->where('model.yearStart <=' ,$year)
                ->where('model.yearEnd >=' ,$year);
            $this->db->group_end();
                $this->db->or_where('model.yearStart' ,$year);
            $this->db->group_end();
        }
        // $this->db->like('spares_undercarriageData.can_change',$can_change);
        $this->db->like('spares_undercarriagedata.modelId',$modelId);
        $this->db->like('spares_undercarriagedata.brandId',$brandId);
        $this->db->like('spares_undercarriagedata.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriagedata.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriagedata.price >=',$price[0]);
        $this->db->where('spares_undercarriagedata.price <=',$price[1]);
        
        $query = $this->db->limit($limit,$start)
                ->group_by("spares_undercarriagedata.spares_undercarriageId, spares_undercarriagedata.spares_brandId, spares_undercarriagedata.modelId, spares_undercarriagedata.brandId, spares_undercarriagedata.modelofcarId")
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
    function SpareDatas_search_count($limit,$start,$order,$dir,$spares_undercarriageId, $spares_brandId, $price,$modelId,$brandId,$year,$can_change){
        $price = explode("-",$price);
        $this->db->select('spares_undercarriagedata.spares_undercarriageDataId,spares_undercarriage.spares_undercarriageId,spares_undercarriagedata.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriagedata.warranty,spares_undercarriagedata.warranty_distance,spares_undercarriagedata.warranty_year,spares_undercarriagedata.spares_undercarriageDataPicture,brand.brandName,model.modelName,model.yearStart,model.yearEnd,spares_brand.spares_brandPicture, spares_undercarriagedata.price,
        spares_brand.spares_brandId,brand.brandId,model.modelId,modelofcar.modelofcarId,modelofcar.modelofcarName,modelofcar.machineSize');
        $this->db->from('spares_undercarriagedata');
        $this->db->where('`spares_undercarriagedata`.`spares_undercarriageDataId` IN (SELECT (SELECT `spares_undercarriageDataId` FROM `spares_undercarriagedata` `rd` WHERE `spares_undercarriageId` = `re`.`spares_undercarriageId` ORDER BY `price` DESC LIMIT 1) as `spares_undercarriageDataId` FROM `spares_undercarriagedata` `re` GROUP BY `spares_undercarriageId`)', NULL, FALSE);
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
        $this->db->join('brand','brand.brandId = spares_undercarriagedata.brandId');
        $this->db->join('model','model.modelId = spares_undercarriagedata.modelId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = spares_undercarriagedata.modelofcarId');
       
        if($year != null){
            $this->db->group_start();
            $this->db->group_start();
                $this->db->where('model.yearStart <=' ,$year)
                ->where('model.yearEnd >=' ,$year);
            $this->db->group_end();
                $this->db->or_where('model.yearStart' ,$year);
            $this->db->group_end();
        }
        // $this->db->like('spares_undercarriageData.can_change',$can_change);
        $this->db->like('spares_undercarriagedata.modelId',$modelId);
        $this->db->like('spares_undercarriagedata.brandId',$brandId);
        $this->db->like('spares_undercarriagedata.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriagedata.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriagedata.price >=',$price[0]);
        $this->db->where('spares_undercarriagedata.price <=',$price[1]);
        
        $query = $this->db->group_by("spares_undercarriage.spares_undercarriageId, spares_brand.spares_brandName")->get();
        return $query->num_rows();   
    }
   
    function getSpareDataForCartById($spares_undercarriageDataId){
        
        $this->db->select('spares_undercarriagedata.spares_undercarriageDataId,spares_undercarriagedata.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriagedata.price,spares_undercarriagedata.warranty,spares_undercarriagedata.warranty_distance,spares_undercarriagedata.warranty_year,spares_undercarriagedata.spares_undercarriageDataPicture,brand.brandName,model.modelName,concat(model.yearStart,"-",model.yearEnd) as year,modelofcar.modelofcarName,modelofcar.machineSize,spares_undercarriage.spares_undercarriageId, spares_brand.spares_brandId, brand.brandId, model.modelId, modelofcar.modelofcarId');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = spares_undercarriagedata.modelofcarId');
        $this->db->join('brand','brand.brandId = spares_undercarriagedata.brandId');
        $this->db->join('model','model.modelId = spares_undercarriagedata.modelId');
        $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->get();
        return $result->row();  
        
    }

    function getCostForOrderDetail($caraccessoryId, $productDetail){
        $this->db->where('modelId', $productDetail['modelId']);
        $this->db->where('spares_undercarriageId', $productDetail['spares_undercarriageId']);
        $this->db->where('spares_brandId', $productDetail['spares_brandId']);
        $this->db->where('brandId', $productDetail['brandId']);
        $this->db->where('modelofcarId', $productDetail['modelofcarId']);
        $this->db->where('create_by', $caraccessoryId);
        $result = $this->db->get('spares_undercarriagedata');
        return $result->row('price');
    }

}