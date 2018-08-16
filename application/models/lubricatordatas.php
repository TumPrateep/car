<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class lubricatordatas extends CI_Model{

    function getlubricatorbyId($lubricator_dataId){
        $this->db->where('lubricator_dataId',$lubricator_dataId);
        $result = $this->db->get('lubricator_data')->row();
        return $result;
    }

    function delete($lubricator_dataId){
        return $this->db->delete('lubricator_data', array('lubricator_dataId' => $lubricator_dataId));
    }

    function allLubricatordata_count(){
        $query = $this
                 ->db
                 ->get('lubricator_data');
     
         return $query->num_rows();
     }
     function allLubricatordatas($limit,$start,$col,$dir, $userId)
     {   
        $this->db->select('lubricator_data.lubricator_dataId, lubricator_data.lubricator_liter, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.create_by, lubricator_data.warranty, lubricator_type.lubricator_typePicture');
        $this->db->from('lubricator_data');
        $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator_brand.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId');
        
        $this->db->where("lubricator_data.create_by", $userId);

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
     function LubricatorDatas_search($limit,$start,$order,$dir,$status, $lubricator_typeId, $lubricator_brandId, $lubricatorId, $lubricator_numberId, $price, $userId){
         
         $price = explode(",",$price);
         $this->db->select('lubricator_data.lubricator_dataId, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.activeFlag, lubricator_data.create_by, lubricator_data.warranty, lubricator.lubricator_picture, lubricator.lubricatorId');
         $this->db->from('lubricator_data');
         $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator_brand.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId');
         $this->db->like('lubricator_number.lubricator_number',$lubricator_number);
         $this->db->like('lubricator_data.lubricatorId',$lubricator);
         $this->db->like('lubricator_data.lubricator_brandId',$lubricator_brandId);
         $this->db->like('lubricator_data.lubricator_typeId',$lubricator_typeId);
         $this->db->like('lubricator_data.lubricatorId',$lubricatorId);
         $this->db->where('lubricator_data.price >=',$price[0]);
         $this->db->where('lubricator_data.price <=',$price[1]);

        $this->db->where("lubricator_data.create_by", $userId);

         if($status != null){
             $this->db->where("lubricator_data.status", $status);
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
     function LubricatorDatas_search_count($lubricator_typeId, $lubricator_brandId, $lubricatorId, $lubricator_numberId, $price, $userId){
         $price = explode(",",$price);
         $this->db->select('lubricator_data.lubricator_dataId, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.activeFlag, lubricator_data.create_by, lubricator_data.warranty, lubricator.lubricator_picture, lubricator.lubricatorId');
         $this->db->from('lubricator_data');
         $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator_brand.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId');
         $this->db->like('lubricator_number.lubricator_number',$lubricator_number);
         $this->db->like('lubricator_data.lubricatorId',$lubricator);
         $this->db->like('lubricator_data.lubricator_brandId',$lubricator_brandId);
         $this->db->like('lubricator_data.lubricator_typeId',$lubricator_typeId);
         $this->db->like('lubricator_data.lubricatorId',$lubricatorId);
         $this->db->where('lubricator_data.price >=',$price[0]);
         $this->db->where('lubricator_data.price <=',$price[1]);

         $this->db->where("lubricator_data.create_by", $userId);
         
         if($status != null){
             $this->db->where("lubricator_data.status", $status);
         }
         $query = $this->db->limit($limit,$start)
                 ->order_by($col,$dir)
                 ->get();
         return $query->num_rows();   
     }

     function checkduplicated($lubricator_brandId,$lubricatorId){
        // $this->db->select('tire_data.tire_brandId');
        $this->db->from('lubricator_data');
        // $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        // $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        // $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        // $this->db->join('rim','rim.rimId = tire_data.rimId');
        // $this->db->join('car_accessories','car_accessories.car_accessoriesId = tire_data.car_accessoriesId');
        $this->db->where('lubricator_data.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_data.lubricatorId',$lubricatorId);
        $result = $this->db->count_all_results();
      
        if($result > 0){
            return true;
        }else{
            return false;
        }
    }
    function insert($data){
        return $this->db->insert('lubricator_data',$data);
    }

    function checkduplicatedUpdate($lubricator_brandId,$lubricatorId,$lubricator_dataId){
        // $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,tire_data.car_accessoriesId,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size');
        $this->db->from('lubricator_data');
        // $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        // $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        // $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        // $this->db->join('rim','rim.rimId = tire_data.rimId');
        // $this->db->join('car_accessories','car_accessoriesId.car_accessoriesId = tire_data.car_accessoriesId');
        $this->db->where('lubricator_data.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_data.lubricatorId',$lubricatorId);
        $this->db->where_not_in('lubricator_data.lubricator_dataId',$lubricator_dataId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else
            return false;
    }
    function update($data,$lubricator_data){
        $this->db->where('lubricator_dataId',$lubricator_dataId);
        return $this->db->update('lubricator_data',$data);
    }

}