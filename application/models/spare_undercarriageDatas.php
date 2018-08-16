<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class spare_undercarriageDatas extends CI_Model{
    function allSpareData_count(){
        $query = $this
                ->db
                ->get('spares_undercarriagedata');
    
        return $query->num_rows();
    }
    function allSpareData($limit,$start,$order,$dir){
        $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.price,spares_undercarriageData.warrnty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warrnty_year,spares_undercarriageData.spares_undercarriageDataPicture');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarraigeData.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        $query = $this->db->limit($limit,$start)->order_by($order,$dir)->get();
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function SpareData_search($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price){
        $price = explode(",",$price);
        $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.price,spares_undercarriageData.warrnty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warrnty_year,spares_undercarriageData.spares_undercarriageDataPicture');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarraigeData.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        $this->db->like('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.price >=',$price[0]);
        $this->db->where('spares_undercarriageData.price <=',$price[1]);
        if($status != null){
            $this->db->where("spares_undercarriageData.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($order,$dir)
                ->get('spares_undercarriagedata');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function SpareDatas_search_count($spares_undercarriageId, $spares_brandId, $price){
        $price = explode(",",$price);
        $this->db->from('spares_undercarriagedata');
        $this->db->select('spares_undercarriageData.spares_brandName,spares_undercarriageData.spares_undercarriageName,spares_brand.spares_brandId,spares_undercarriage.spares_undercarriageId,spares_undercarriageData.price');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarraigeData.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spare_undercarriageId');
        $this->db->like('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.price >=',$price[0]);
        $this->db->where('spares_undercarriageData.price <=',$price[1]);
        if($status != null){
            $this->db->where("spares_undercarriageData.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        return $query->num_rows();   
    }
    function checknotDuplicated($spares_brandId,$spares_undercarriageId){
        $this->db->from('spares_undercarriageData');
        $this->db->where('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->where('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $result = $this->db->count_all_results();
        // echo $this->db->last_query();
        // exit();
        if($result > 0){
            return true;
        }
            return false;
    }
    function insert($data){
       return $this->db->insert('spares_undercarriageData',$data);
    }
    function checknotDuplicatedforUpdate($spares_brandId,$spares_undercarriageId,$spares_undercarriageDataId){
        $this->db->from('spares_undercarriageData');
        $this->db->where('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->where('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return true;
        }
            return false;
    }
    function checkStatus($userId,$spares_undercarriageDataId){
        $this->db->from('spares_undercarriageData');
        $this->db->where('spares_undercarriageData.create_by',$userId);
        $this->db->where('spares_undercarriageData.spares_undercarriageDataId',$spares_undercarriageDataId);
        $this->db->where('spares_undercarriageData.status',2);
        $this->db->where('spares_undercarriageData.activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
            return true;
    }
    function update($data){
        $this->db->where('spares_undercarriageDataId',$data['spares_undercarriageDataId']);
        $result = $this->db->update('spares_undercarriageData', $data);
        return $result;
    }
    function checkValue($spares_undercarriageDataId,$spares_brandId,$spares_undercarriageDataId){
        $this->db->from('spares_undercarriageData');
        $this->db->where('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->where('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
            return true;

    }
}