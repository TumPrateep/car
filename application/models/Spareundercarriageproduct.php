<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spareundercarriageproduct extends CI_Model{

    function allSpareData_count(){
        $query = $this
                ->db
                ->get('spares_undercarriagedata');
    
        return $query->num_rows();
    }
    function allSpareData($limit,$start,$order,$dir){
        $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_undercarriageData.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.price,spares_undercarriageData.warranty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warranty_year,spares_undercarriageData.spares_undercarriageDataPicture,brand.brandName,model.modelName,model.yearStart,model.yearEnd');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        $this->db->join('brand','brand.brandId = spares_undercarriageData.brandId');
        $this->db->join('model','model.modelId = spares_undercarriageData.modelId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = spares_undercarriageData.modelofcarId');
        
        
        

        $query = $this->db->limit($limit,$start)->order_by($order,$dir)->get();
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }else{
            return null;
        }
    }

    function SpareData_search($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price,$modelId,$brandId,$yearStart,$yearEnd,$can_change,$warranty_distance,$warranty_year){
        $price = explode("-",$price);
        $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_undercarriageData.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.price,spares_undercarriageData.warranty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warranty_year,spares_undercarriageData.spares_undercarriageDataPicture,brand.brandName,model.modelName,model.yearStart,model.yearEnd,spares_undercarriageData.can_change');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        $this->db->join('brand','brand.brandId = spares_undercarriageData.brandId');
        $this->db->join('model','model.modelId = spares_undercarriageData.modelId');
        $this->db->join('model','model.yearStart = spares_undercarriageData.yearStart');
        $this->db->join('model','model.yearEnd = spares_undercarriageData.yearEnd');
       
        $this->db->like('spares_undercarriageData.yearStart',$yearStart);
        $this->db->like('spares_undercarriageData.yearEnd',$yearEnd);
        $this->db->like('spares_undercarriageData.can_change',$can_change);
        $this->db->like('spares_undercarriageData.modelId',$modelId);
        $this->db->like('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.price >=',$price[0]);
        $this->db->where('spares_undercarriageData.price <=',$price[1]);
        

        if($status != null){
            $this->db->where("spares_undercarriageData.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($order,$dir)
                ->get();
        
        // $result = $this->db->last_query();
        // echo $result;
        // exit();
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function SpareDatas_search_count($limit,$start,$order,$dir,$spares_undercarriageId, $spares_brandId, $price,$modelId,$brandId,$yearStart,$yearEnd,$can_change,$warranty_distance,$warranty_year,$status){
        $price = explode("-",$price);
        $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_undercarriageData.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.price,spares_undercarriageData.warranty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warranty_year,spares_undercarriageData.spares_undercarriageDataPicture,brand.brandName,model.modelName,model.yearStart,model.yearEnd,spares_undercarriageData.can_change');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        $this->db->join('brand','brand.brandId = spares_undercarriageData.brandId');
        $this->db->join('model','model.modelId = spares_undercarriageData.modelId');
        $this->db->join('model','model.yearStart = spares_undercarriageData.yearStart');
        $this->db->join('model','model.yearEnd = spares_undercarriageData.yearEnd');
       
        // $this->db->like('spares_undercarriageData.yearStart',$yearStart);
        // $this->db->like('spares_undercarriageData.yearEnd',$yearEnd);
        $this->db->like('spares_undercarriageData.can_change',$can_change);
        $this->db->like('spares_undercarriageData.modelId',$modelId);
        $this->db->like('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.price >=',$price[0]);
        // $this->db->where('spares_undercarriageData.price <=',$price[1]);
        
        
        if($status != null){
            $this->db->where("spares_undercarriageData.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($order,$dir)
                ->get();
        return $query->num_rows();   
    }
   

}