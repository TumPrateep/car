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
     function allLubricatordatas($limit,$start,$col,$dir)
     {   
         $this->db->select('lubricator_data.lubricator_dataId, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.activeFlag, lubricator_data.create_by, lubricator_data.warranty, lubricator.lubricator_picture, lubricator.lubricatorId');
         $this->db->from('lubricator_data');
         $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_data.lubricator_typeId');
         $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator_data.lubricator_brandId');
         $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
         $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator_data.lubricator_numberId');
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
     function LubricatorDatas_search($limit,$start,$order,$dir,$status, $lubricator_typeId, $lubricator_brandId, $lubricatorId, $lubricator_numberId, $price){
         
         $price = explode(",",$price);
         $this->db->select('lubricator_data.lubricator_dataId, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.activeFlag, lubricator_data.create_by, lubricator_data.warranty, lubricator.lubricator_picture, lubricator.lubricatorId');
         $this->db->from('lubricator_data');
         $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_data.lubricator_typeId');
         $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator_data.lubricator_brandId');
         $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
         $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator_data.lubricator_numberId');
         $this->db->like('lubricator_number.lubricator_number',$lubricator_number);
         $this->db->like('lubricator_data.lubricatorId',$lubricator);
         $this->db->like('lubricator_data.lubricator_brandId',$lubricator_brandId);
         $this->db->like('lubricator_data.lubricator_typeId',$lubricator_typeId);
         $this->db->like('lubricator_data.lubricatorId',$lubricatorId);
         $this->db->where('lubricator_data.price >=',$price[0]);
         $this->db->where('lubricator_data.price <=',$price[1]);
         
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
     function LubricatorDatas_search_count($lubricator_typeId, $lubricator_brandId, $lubricatorId, $lubricator_numberId, $price){
         $price = explode(",",$price);
         $this->db->select('lubricator_data.lubricator_dataId, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.activeFlag, lubricator_data.create_by, lubricator_data.warranty, lubricator.lubricator_picture, lubricator.lubricatorId');
         $this->db->from('lubricator_data');
         $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_data.lubricator_typeId');
         $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator_data.lubricator_brandId');
         $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
         $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator_data.lubricator_numberId');
         $this->db->like('lubricator_number.lubricator_number',$lubricator_number);
         $this->db->like('lubricator_data.lubricatorId',$lubricator);
         $this->db->like('lubricator_data.lubricator_brandId',$lubricator_brandId);
         $this->db->like('lubricator_data.lubricator_typeId',$lubricator_typeId);
         $this->db->like('lubricator_data.lubricatorId',$lubricatorId);
         $this->db->where('lubricator_data.price >=',$price[0]);
         $this->db->where('lubricator_data.price <=',$price[1]);
         
         if($status != null){
             $this->db->where("lubricator_data.status", $status);
         }
         $query = $this->db->limit($limit,$start)
                 ->order_by($col,$dir)
                 ->get();
         return $query->num_rows();   
     }

}