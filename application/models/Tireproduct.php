<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tireproduct extends CI_Model{

    function allTires($limit,$start,$col,$dir)
    {   
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture,tire_brand.tire_brandId');
        $this->db->from('tire_data');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');

        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();

        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function allTire_count(){
        $this->db->where("tire_data.status", 1);
        $query = $this->db->get('tire_data');
    
        return $query->num_rows();
    }

    function tireData_search($limit,$start,$order,$dir,$status,$tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $can_change,$warranty_year,$warranty_distance,$brandId,$modelId,$modelofcarId,$yearStart,$yearEnd){
        
        $price = explode("-",$price);
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,brand.brandName,model.modelName,modelofcar.modelofcarName,modelofcar.machineCode,modelofcar.machineSize,model.yearStart,model.yearEnd');
        $this->db->from('tire_data');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->join('brand','brand.brandId = tire_data.brandId');
        $this->db->join('model','model.modelId = tire_data.modelId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = tire_data.modelofcarId');
        $this->db->like('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->like('tire_data.tire_brandId',$tire_brandId);
        $this->db->like('tire_data.tire_modelId',$tire_modelId);
        $this->db->like('tire_data.rimId',$rimId);
        $this->db->like('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->like('tire_data.can_change',$can_change);
        $this->db->like('tire_data.brandId',$brandId);
        $this->db->like('tire_data.modelofcarId',$modelofcarId);
        $this->db->where('tire_data.price >=',$price[0]);
        $this->db->where('tire_data.price <=',$price[1]);
        
        
        if($status != null){
            $this->db->where("tire_data.status", $status);
        }

        $query = $this->db->limit($limit,$start)
                ->order_by($order,$dir)
                ->get();

        
    
            return $query->result();  
       
    } 
    function TireDatas_search_count($limit,$start,$order,$dir,$tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $can_change,$warranty_year,$warranty_distance,$status,$brandId,$modelId,$modelofcarId,$yearStart,$yearEnd){
        $price = explode("-",$price);
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,brand.brandName,model.modelName,modelofcar.modelofcarName,modelofcar.machineCode,modelofcar.machineSize,model.yearStart,model.yearEnd');
        $this->db->from('tire_data');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->join('brand','brand.brandId = tire_data.brandId');
        $this->db->join('model','model.modelId = tire_data.modelId');
        $this->db->join('modelofcar','modelofcar.modelofcarId = tire_data.modelofcarId');
        $this->db->like('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->like('tire_data.tire_brandId',$tire_brandId);
        $this->db->like('tire_data.tire_modelId',$tire_modelId);
        $this->db->like('tire_data.rimId',$rimId);
        $this->db->like('tire_data.tire_sizeId',$tire_sizeId);
        $this->db->like('tire_data.can_change',$can_change);
        $this->db->like('tire_data.brandId',$brandId);
        $this->db->like('tire_data.modelId',$modelId);
        $this->db->like('tire_data.modelofcarId',$modelofcarId);
        $this->db->where('tire_data.price >=',$price[0]);
        $this->db->where('tire_data.price <=',$price[1]);
        
        
        if($status != null){
            $this->db->where("tire_data.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($order,$dir)
                ->get();
        return $query->num_rows();   
    }

    function getTireDataForCartById($tire_dataId){
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId');
        $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_data.rimId');
        $this->db->where('tire_data.tire_dataId',$tire_dataId);
        $result = $this->db->get('tire_data');
        return $result->row();  
        
    }

    
    
}
