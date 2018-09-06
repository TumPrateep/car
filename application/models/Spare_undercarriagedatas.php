<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spare_undercarriagedatas extends CI_Model{
    function allSpareData_count(){
        $query = $this
                ->db
                ->get('spares_undercarriagedata');
    
        return $query->num_rows();
    }
    function allSpareData($limit,$start,$order,$dir,$userId){
        $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_undercarriageData.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.price,spares_undercarriageData.warranty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warranty_year,spares_undercarriageData.spares_undercarriageDataPicture');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        
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
        $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_undercarriageData.status,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.price,spares_undercarriageData.warranty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warranty_year,spares_undercarriageData.spares_undercarriageDataPicture');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        $this->db->like('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.price >=',$price[0]);
        $this->db->where('spares_undercarriageData.price <=',$price[1]);
        $this->db->where("spares_undercarriagedata.create_by", $userId);

        if($status != null){
            $this->db->where("spares_undercarriageData.status", $status);
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
        $this->db->select('spares_undercarriageData.spares_undercarriageDataId,spares_brand.spares_brandName,spares_undercarriage.spares_undercarriageName,spares_undercarriageData.price,spares_undercarriageData.warranty,spares_undercarriageData.warranty_distance,spares_undercarriageData.warranty_year,spares_undercarriageData.spares_undercarriageDataPicture');
        $this->db->from('spares_undercarriagedata');
        $this->db->join('spares_brand','spares_brand.spares_brandId = spares_undercarriagedata.spares_brandId');
        $this->db->join('spares_undercarriage','spares_undercarriage.spares_undercarriageId = spares_undercarriageData.spares_undercarriageId');
        $this->db->like('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->like('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.price >=',$price[0]);
        $this->db->where('spares_undercarriageData.price <=',$price[1]);
        $this->db->where("spares_undercarriagedata.create_by", $userId);
        
        if($status != null){
            $this->db->where("spares_undercarriageData.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        return $query->num_rows();   
    }
    function data_check_create($spares_brandId,$spares_undercarriageId,$userId){
        $this->db->from('spares_undercarriageData');
        $this->db->where('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->where('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('spares_undercarriageData.create_by',$userId);
        $result = $this->db->get();
        return $result->row();
    }
    function insert($data){
       return $this->db->insert('spares_undercarriageData',$data);
    }
    function data_check_update($spares_brandId,$spares_undercarriageId,$spares_undercarriageDataId){
        $this->db->from('spares_undercarriageData');
        $this->db->where('spares_undercarriageData.spares_brandId',$spares_brandId);
        $this->db->where('spares_undercarriageData.spares_undercarriageId',$spares_undercarriageId);
        $this->db->where_not_in('spares_undercarriageData.spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->get();
        return $result->row();
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
    function getspares_undercarriageDatabyId($spares_undercarriageDataId){
        return $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId)->get("spares_undercarriageData")->row();
    }

    function checkSpareUndercarriageData($spares_undercarriageDataId) {
        $this->db->from('spares_undercarriageData');
        $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }

    function getupdate($spares_undercarriageDataId){
        $this->db->select("price,spares_brandId,spares_undercarriageDataId,spares_undercarriageDataPicture,spares_undercarriageId,status,warranty,warranty_distance,warranty_year,modelId,brandId,yearStart,yearEnd,modelofcarId,machineSize");
        $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId);
        $result = $this->db->get('spares_undercarriageData')->row();
        return $result;
    }
    function delete($spares_undercarriageDataId){
        return $this->db->delete('spares_undercarriageData',array('spares_undercarriageDataId' => $spares_undercarriageDataId));
    }

    function getspareDatasById($spares_undercarriageDataId){
        return $this->db->where('spares_undercarriageDataId',$spares_undercarriageDataId)->get("spares_undercarriagedata")->row();
    }
}