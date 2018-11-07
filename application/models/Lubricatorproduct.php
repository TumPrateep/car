<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorproduct extends CI_Model{

    function allLubricatordata_count(){
        $this->db->where("lubricator_data.status", 1);
        $query = $this->db->get('lubricator_data');
     
        return $query->num_rows();
     }

     function allLubricatordatas($limit,$start,$col,$dir)
     {   
        $this->db->select('lubricator_data.lubricator_dataId, lubricator.capacity, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, lubricator_number.lubricator_gear, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.create_by, lubricator_data.warranty, lubricator_type.lubricator_typePicture, lubricator_type.lubricator_typeSize, lubricator_data.lubricator_dataPicture, lubricator.capacity, lubricator_brand.lubricator_brandPicture');
        $this->db->from('lubricator_data');
        $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId', 'left');
        
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();

        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
         
     }
}