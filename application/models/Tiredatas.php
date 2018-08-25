<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tiredatas extends CI_Model{
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
        // $this->db->select('tire_data.tire_brandId');
        $this->db->from('tire_data');
        // $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        // $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        // $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        // $this->db->join('rim','rim.rimId = tire_data.rimId');
        // $this->db->join('car_accessories','car_accessories.car_accessoriesId = tire_data.car_accessoriesId');
        $this->db->where('tire_data.tire_brandId',$tire_brandId);
        $this->db->where('tire_data.tire_modelId',$tire_modelId);
        $this->db->where('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->where('tire_data.rimId',$rimId);
        $this->db->where('tire_data.car_accessoriesId',$car_accessoriesId);
        $result = $this->db->count_all_results();
      
        if($result > 0){
            return true;
        }else{
            return false;
        }
    }
    function insert($data){
        return $this->db->insert('tire_data',$data);
    }

    function checkduplicatedUpdate($tire_brandId,$tire_modelId,$tire_sizeId,$rimId,$car_accessoriesId,$tire_dataId){
        // $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,tire_data.car_accessoriesId,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size');
        $this->db->from('tire_data');
        // $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        // $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        // $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        // $this->db->join('rim','rim.rimId = tire_data.rimId');
        // $this->db->join('car_accessories','car_accessoriesId.car_accessoriesId = tire_data.car_accessoriesId');
        $this->db->where('tire_data.tire_brandId',$tire_brandId);
        $this->db->where('tire_data.tire_modelId',$tire_modelId);
        $this->db->where('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->where('tire_data.rimId',$rimId);
        $this->db->where('tire_data.car_accessoriesId',$car_accessoriesId);
        $this->db->where_not_in('tire_data.tire_dataId',$tire_dataId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else
            return false;
    }
    function update($data,$tire_dataId){
        $this->db->where('tire_dataId',$tire_dataId);
        return $this->db->update('tire_data',$data);
    }
    
    function gettire_dataById($tire_dataId){
        // $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,tire_data.car_accessoriesId');
        $this->db->where('tire_dataId',$tire_dataId);
        $result = $this->db->get('tire_data')->row();
        return $result;
    }
    function allTire_count($userId){
        $this->db->where('create_by', $userId);
        $query = $this
                ->db
                ->get('tire_data');
    
        return $query->num_rows();
    }
    function allTires($limit,$start,$col,$dir,$userId)
    {   
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture,tire_brand.tire_brandId');
        $this->db->from('tire_data');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->where('tire_data.create_by', $userId);
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function tireData_search($limit,$start,$order,$dir,$status,$tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $userId){
        
        $price = explode(",",$price);
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId');
        $this->db->from('tire_data');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->like('rim.rimName',$rimName);
        $this->db->like('tire_data.tire_sizeId',$tire_size);
        $this->db->like('tire_data.tire_brandId',$tire_brandId);
        $this->db->like('tire_data.tire_modelId',$tire_modelId);
        $this->db->like('tire_data.rimId',$rimId);
        $this->db->like('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->like('tire_data.can_change',$can_change);
        $this->db->where('tire_data.price >=',$price[0]);
        $this->db->where('tire_data.price <=',$price[1]);
        $this->db->where('tire_data.create_by', $userId);
        
        if($status != null){
            $this->db->where("tire_data.status", $status);
        }

        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
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
    function TireDatas_search_count($tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $userId){
        $price = explode(",",$price);
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId');
        $this->db->from('tire_data');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->like('rim.rimName',$rimName);
        $this->db->like('tire_data.tire_sizeId',$tire_size);
        $this->db->like('tire_data.tire_brandId',$tire_brandId);
        $this->db->like('tire_data.tire_modelId',$tire_modelId);
        $this->db->like('tire_data.rimId',$rimId);
        $this->db->like('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->like('tire_data.can_change',$can_change);
        $this->db->where('tire_data.price >=',$price[0]);
        $this->db->where('tire_data.price <=',$price[1]);
        $this->db->where('tire_data.create_by', $userId);
        
        if($status != null){
            $this->db->where("tire_data.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        return $query->num_rows();   
    }
    
}
