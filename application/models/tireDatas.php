<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class TireDatas extends CI_Model{
    function getirebyId($tire_dataId){
        $this->db->select('*');
        $this->db->where('tire_dataId',$tire_dataId);
        $result = $this->db->get('tire_data')->row();
        return $result;
    }

    function checkstatus($tire_dataId,$userId){
        $this->db->from('tire_data');
        $this->db->where('tire_dataId',$tire_dataId);
        $this->db->where('create_by',$userId);
        $this->db->where('status',2);
        $this->db->where('activeFlag',2);       
        $result = $this->db->count_all_results();
        if($result){
            return true;
        }else
            return false;
    }
        
    function delete($tire_dataId){
        return $this->db->delete('tire_data',array('tire_dataId' => $tire_dataId));
    }
    function checkduplicated($tire_brandId,$tire_modelId,$tire_sizeId,$rimId,$car_accessoriesId){
        $this->db->select('tire_data.tire_brandId');
        $this->db->from('tire_data');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
<<<<<<< HEAD
        $this->db->join('tire_modelId','tire_model.tire_modelId = tire_data.tire_modelId');
=======
        $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
>>>>>>> 84b7b973c7f6eea6ae4a7a0380b4320304893b26
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->join('car_accessories','car_accessories.car_accessoriesId = tire_data.car_accessoriesId');
        $this->db->where('tire_data.tire_brandId',$tire_brandId);
        $this->db->where('tire_data.tire_modelId',$tire_modelId);
        $this->db->where('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->where('tire_data.rimId',$tire_rimId);
        $this->db->where('tire_data.car_accessoriesId',$car_accessoriesId);
        $result = $this->db->count_all_results();
    
        if($result > 0){
            return false;
        }else{
            return true;
        }
    }
    function insert($data){
        return $this->db->insert('tire_data',$data);
    }

    function checkduplicatedUpdate($tire_brandId,$tire_modelId,$tire_sizeId,$rimId,$car_accessoriesId,$tire_dataId){
        $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,tire_data.car_accessoriesId,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size');
        $this->db->from('tire_data');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId  ');
        $this->db->join('tire_modelId','tire_model.tire_modelId = tire_data.tire_modelId ');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->join('car_accessories','car_accessoriesId.car_accessoriesId = tire_data.car_accessoriesId');
        $this->db->where('tire_data.tire_brandId',$tire_brandId);
        $this->db->whrer('tire_data.tire_modelId',$tire_modelId);
        $this->db->where('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->where('tire_data.rimId',$tire_rimId);
        $this->db->where('tire_data.car_accessoriesId',$car_accessoriesId);
        $this->db->where_not_in('tire_data.tire_dataId',$tire_dataId);
        $result = $this->db->count_all_results();
        if($result){
            return true;
        }else
            return false;
    }
    function update($data,$tire_dataId){
        $this->db->where('tire_dataId',$tire_dataId);
        $this->db->update('tire_data',$data);
    }
    
    function gettire_dataById($tire_dataId){
        $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,tire_data.car_accessoriesId');
        $this->db->where('tire_dataId',$tire_dataId);
        $result = $this->db->get('tire_data')->row();
        return $result;
    }
    function allTire_count(){
       $query = $this
                ->db
                ->get('tire_data');
    
        return $query->num_rows();
    }
    function allTires($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tire_data');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function tireData_search($limit,$start,$order,$dir,$status,$rim,$tire_size,$tire_brandName,$tire_modelName,$warranty_distance,$warranty_year,$can_change){
        $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_modelId','tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->like('rim.rimId',$rimId);
        $this->db->like('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->like('tire_data.tire_brandId',$tire_brandId);
        $this->db->like('tire_data.tire_modelId',$tire_modelId);
        $this->db->like('tire_data.warranty_distance',$warranty_distance);
        $this->db->like('tire_data.warranty_year',$warranty_year);
        $this->db->like('tire_data.can_change',$can_change);

        if($status != null){
            $this->db->where("tire_data.status", $status);
        }

        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tire_data');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    } 
    function  TireDatas_search_count($rimId,$tire_sizeId,$tire_brandId,$tire_modelId,$warranty_distance,$warranty_year,$status,$can_change){
        $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size');
        $query = $this
                ->db
                ->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId')
                ->join('tire_modelId','tire_model.tire_modelId = tire_data.tire_modelId')
                ->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId')
                ->join('rim','rim.rimId = tire_data.rimId')
                ->like('rim.rimId',$rimId)
                ->like('tire_data.tire_sizeId',$tire_sizeId)
                ->like('tire_data.tire_brandId',$tire_brandId)
                ->like('tire_data.tire_modelId',$tire_modelId)
                ->like('tire_data.warranty_distance',$warranty_distance)
                ->like('tire_data.warranty_year',$warranty_year)
                ->like('tire_data.can_change',$can_change)
                ->where('tire_data.status', $status)
                ->get('tire_data');
    
        return $query->num_rows();
    }
    
}
