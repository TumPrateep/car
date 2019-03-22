<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatordatas extends CI_Model{

    function getlubricatorDatabyId($lubricator_dataId){
        return $this->db->where('lubricator_dataId',$lubricator_dataId)->get('lubricator_data')->row();      
    }

    function delete($lubricator_dataId){
        return $this->db->delete('lubricator_data', array('lubricator_dataId' => $lubricator_dataId));
    }

    function allLubricatordata_count($userId){
        $this->db->where("lubricator_data.create_by", $userId);
        $query = $this->db->get('lubricator_data');
     
         return $query->num_rows();
     }
     function allLubricatordatas($limit,$start,$col,$dir,$userId)
     {   
        $this->db->select('lubricator_data.lubricator_dataId, lubricator.capacity, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator_brand.lubricator_brandId, lubricator.lubricatorName, 
        lubricator_number.lubricator_number, lubricator_number.lubricator_gear, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, 
        lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.create_by, lubricator_data.warranty, lubricator_type.lubricator_typePicture, lubricator_type.lubricator_typeSize, lubricator_data.lubricator_dataPicture, lubricator.capacity, lubricator_brand.lubricator_brandPicture, lubricator.lubricatorId');
        $this->db->from('lubricator_data');
        $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId', 'left');
        
        $this->db->where("lubricator_data.create_by", $userId);

        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }else{
            return null;
        }
         
     }
     
     function LubricatorDatas_search($limit,$start,$order,$dir,$status,$lubricatorId, $lubricator_brandId, $lubricator_gear, $price, $userId){

        $price = explode(",",$price);
        // $this->db->select_max('lubricator_data.price');
        $this->db->select('lubricator_data.lubricator_dataId, lubricator.capacity, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, lubricator_number.lubricator_gear, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.create_by, lubricator_data.warranty, lubricator_type.lubricator_typePicture, lubricator_type.lubricator_typeSize, lubricator_data.lubricator_dataPicture, lubricator.capacity, lubricator_brand.lubricator_brandPicture, lubricator.lubricatorId');        
        $this->db->from('lubricator_data');
        $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId', 'left');
        
        $this->db->like('lubricator_brand.lubricator_brandId',$lubricator_brandId);
        $this->db->like('lubricator_data.lubricatorId',$lubricatorId);
        $this->db->like('lubricator_number.lubricator_gear',$lubricator_gear);
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
     function LubricatorDatas_search_count($lubricatorId, $lubricator_brandId, $lubricator_gear, $price, $userId){
         $price = explode(",",$price);
         $this->db->select('lubricator_data.lubricator_dataId, lubricator.capacity, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, lubricator_number.lubricator_gear, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.create_by, lubricator_data.warranty, lubricator_type.lubricator_typePicture, lubricator_type.lubricator_typeSize, lubricator_data.lubricator_dataPicture, lubricator.capacity, lubricator_brand.lubricator_brandPicture, lubricator.lubricatorId');
         $this->db->from('lubricator_data');
         $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
         $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
         $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
         $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId', 'left');
         
         $this->db->like('lubricator_brand.lubricator_brandId',$lubricator_brandId);
         $this->db->like('lubricator_data.lubricatorId',$lubricatorId);
         $this->db->like('lubricator_number.lubricator_gear',$lubricator_gear);
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

     function data_check_create($lubricatorId,$lubricator_brandId,$userId){
        $this->db->from('lubricator_data');
        $this->db->where('lubricator_data.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_data.lubricatorId',$lubricatorId);
        $this->db->where('lubricator_data.create_by',$userId);
        $result = $this->db->get();
        return $result->row();
        
    }
    function insert($data){
        return $this->db->insert('lubricator_data',$data);
    }

    function data_check_update($lubricatorId,$lubricator_brandId,$lubricator_dataId){
        $this->db->from('lubricator_data');
        $this->db->where('lubricator_data.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_data.lubricatorId',$lubricatorId);
        $this->db->where_not_in('lubricator_data.lubricator_dataId',$lubricator_dataId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        
        $this->db->where('lubricator_dataId',$data['lubricator_dataId']);
        return $this->db->update('lubricator_data',$data);
    }
    function checklubricator_dataId($lubricator_dataId) {
        $this->db->from('lubricator_data');
        $this->db->where('lubricator_dataId',$lubricator_dataId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }

    function getupdate($lubricator_dataId){
        $this->db->select("lubricator_data.price,lubricator_data.lubricator_brandId,lubricator_data.lubricator_dataId,lubricator_data.lubricator_dataPicture,lubricator_data.lubricatorId,lubricator_data.status,lubricator_data.warranty,lubricator_data.warranty_distance,lubricator_data.warranty_year,lubricator_number.lubricator_gear");
        $this->db->from("lubricator_data");
        $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
        $this->db->where("lubricator_data.lubricator_dataId", $lubricator_dataId);
        $result = $this->db->get()->row();
        return $result;
    }

    
    function getlubricatorDatasById($lubricator_dataId){
        return $this->db->where('lubricator_dataId',$lubricator_dataId)->get("lubricator_data")->row();
    }

    function getLubricatorDataForCartByIdArray($lubricator_dataIdArray){
        if($lubricator_dataIdArray == null){
            return null;
        }
        $this->db->select('lubricator_data.lubricator_dataId, lubricator.capacity, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, lubricator_number.lubricator_gear, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.create_by, lubricator_data.warranty, lubricator_type.lubricator_typePicture, lubricator_type.lubricator_typeSize, lubricator_data.lubricator_dataPicture, lubricator.capacity, lubricator_brand.lubricator_brandPicture,lubricator.lubricatorId');        
        $this->db->from("lubricator_data");
        $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId', 'left');
        $this->db->where_in("lubricator_data.lubricator_dataId", $lubricator_dataIdArray);
        $result = $this->db->get();
        if($result->num_rows()>0){
            return $result->result();  
        }else{
            return null;
        }
    }

    function getLubricatorIdForOrderDetail($lubricator_dataId){
        $this->db->select('lubricatorId');
        $this->db->from("lubricator_data");
        $this->db->where("lubricator_dataId", $lubricator_dataId);
        $result = $this->db->get();
        return $result->row();
    }   

    function getLubricatorDataForCartById($lubricator_dataId){
        $this->db->select('lubricator_data.lubricator_dataId as productId, lubricator.capacity, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, lubricator_number.lubricator_gear, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.price, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.create_by, lubricator_data.warranty, lubricator_type.lubricator_typePicture, lubricator_type.lubricator_typeSize, lubricator_data.lubricator_dataPicture, lubricator.capacity, lubricator_brand.lubricator_brandPicture, lubricator_data.lubricator_dataPicture as picture, lubricator.lubricatorId');        
        $this->db->from("lubricator_data");
        $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId', 'left');
        $this->db->where("lubricator_data.lubricator_dataId", $lubricator_dataId);
        $result = $this->db->get();
        return $result->row();
    }

    function getLubricatorDataForOrderByIdArray($lubricator_dataIdArray, $orderId = null, $group){
        if($lubricator_dataIdArray == null){
            return null;
        }
        $this->db->select('lubricator_data.lubricator_dataId, lubricator.capacity, lubricator_type.lubricator_typeName, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, lubricator_number.lubricator_gear, concat(lubricator_brand.lubricator_brandName,"/",lubricator.lubricatorName) as lubricator, lubricator_data.status, lubricator_data.warranty_year, lubricator_data.warranty_distance, lubricator_data.create_by, lubricator_data.warranty, lubricator_type.lubricator_typePicture, lubricator_type.lubricator_typeSize, lubricator_data.lubricator_dataPicture, lubricator.capacity, lubricator_brand.lubricator_brandPicture, orderdetail.quantity, orderdetail.cost, orderdetail.charge, lubricator.lubricatorId');        
        $this->db->from("lubricator_data");
        $this->db->join('orderdetail','orderdetail.productId = lubricator_data.lubricator_dataId');
        $this->db->join('lubricator','lubricator.lubricatorId = lubricator_data.lubricatorId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
        $this->db->join('lubricator_type','lubricator_type.lubricator_typeId = lubricator_number.lubricator_typeId', 'left');
        $this->db->where_in("lubricator_data.lubricator_dataId", $lubricator_dataIdArray);
        $this->db->where('orderdetail.group', $group);
        if($orderId != null){
            $this->db->where_in("orderdetail.orderId", $orderId);
        }
        $result = $this->db->get();
 
        if($result->num_rows()>0){
            return $result->result();  
        }else{
            return null;
        }
    }

    function getCostForOrderDetail($caraccessoryId, $productDetail){
        $this->db->where('lubricatorId', $productDetail);
        $this->db->where('create_by', $caraccessoryId);
        $result = $this->db->get('lubricator_data');
        return $result->row('price');
    }

}