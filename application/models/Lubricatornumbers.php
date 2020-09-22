<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatornumbers extends CI_Model {

    function allLubricatorNumbers_count(){   
        $query = $this->db->get('lubricator_number');
        return $query->num_rows();                                                                                                                                                                                     
    }

    function allLubricatorNumbers($limit,$start,$col,$dir)
    {  
        $this->db->select('lubricator_number.lubricator_numberId,lubricator_number.lubricator_number, lubricator_number.lubricator_gear, lubricator_type.lubricator_typeName as lubricator_typeName, lubricator_number.lubricator_typeId, lubricator_number.status, lubricator_number.activeFlag, lubricator_number.create_by, lubricator_type.lubricator_typeSize'); 
        $this->db->from('lubricator_number');
        $this->db->join('lubricator_type', 'lubricator_number.lubricator_typeId = lubricator_type.lubricator_typeId' , 'left');
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function lubricatorNumber_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->select('lubricator_number.lubricator_numberId,lubricator_number.lubricator_number, lubricator_number.lubricator_gear, lubricator_type.lubricator_typeName as lubricator_typeName, lubricator_number.lubricator_typeId, lubricator_number.status, lubricator_number.activeFlag, lubricator_number.create_by, lubricator_type.lubricator_typeSize'); 
        $this->db->from('lubricator_number');
        $this->db->join('lubricator_type', 'lubricator_number.lubricator_typeId = lubricator_type.lubricator_typeId' , 'left');
        
        $this->db->like('lubricator_number.lubricator_number',$search);
        if($status != null){
            $this->db->where("lubricator_number.status", $status);
        }
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

    function lubricatorNumber_search_count($search,$status)
    {
        $this->db->select('lubricator_number.lubricator_numberId,lubricator_number.lubricator_number, lubricator_number.lubricator_gear, lubricator_type.lubricator_typeName as lubricator_typeName, lubricator_number.lubricator_typeId, lubricator_number.status, lubricator_number.activeFlag, lubricator_number.create_by, lubricator_type.lubricator_typeSize'); 
        $this->db->from('lubricator_number');
        $this->db->join('lubricator_type', 'lubricator_number.lubricator_typeId = lubricator_type.lubricator_typeId' , 'left');
        
        $this->db->like('lubricator_number.lubricator_number',$search);
        if($status != null){
            $this->db->where("lubricator_number.status", $status);
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    function updateStatus($lubricator_numberId,$data){
        $this->db->where('lubricator_numberId',$lubricator_numberId);
        $result = $this->db->update('lubricator_number', $data);
        return $result; 
    }

    function getLubricatorNumberById($lubricator_numberId){
        return $this->db->where('lubricator_numberId',$lubricator_numberId)->get("lubricator_number")->row();
    }

    function delete($lubricator_numberId){
        $this->db->where("lubricator_numberId",$lubricator_numberId );
        return $this->db->delete('lubricator_number');
    }

    function wherenotLubricatorNumber($lubricator_numberId,$lubricator_number){
        $this->db->select("lubricator_number");
        $this->db->from("lubricator_number");
        $this->db->where('lubricator_number', $lubricator_number);
        $this->db->where_not_in('lubricator_numberId', $lubricator_numberId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }

    function update($data){
        $this->db->where('lubricator_numberId',$data['lubricator_numberId']);
        $result = $this->db->update('lubricator_number', $data);
        return $result;
    }

    function data_check_create($lubricator_number, $lubricator_gear){
        $this->db->where("lubricator_number", $lubricator_number);
        $this->db->where("lubricator_gear", $lubricator_gear);
        $result = $this->db->from("lubricator_number")->get();
        return $result->row();
    }

    function data_check_update($lubricator_number, $lubricator_gear, $lubricator_numberId){
        $this->db->where("lubricator_number", $lubricator_number);
        $this->db->where("lubricator_gear", $lubricator_gear);
        $this->db->where_not_in("lubricator_numberId", $lubricator_numberId);
        $result = $this->db->from("lubricator_number")->get();
        return $result->row();
    }

    function  insert($data){
        return $this->db->insert('lubricator_number', $data);
    }
    function CheckStatus($lubricator_numberId,$userId,$status){
        $this->db->from("lubricator_number");
        $this->db->where('lubricator_numberId',$lubricator_numberId);
        $this->db->where('create_by',$userId);
        $this->db->where('status',$status);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result){
            return true;
        }
        return false;
    }
    function checkLubricatorNumberCarAcc($lubricator_number, $lubricator_gear, $lubricator_numberId){
        $this->db->where("lubricator_number", $lubricator_number);
        $this->db->where("lubricator_gear", $lubricator_gear);

        if($lubricator_numberId != null){
            $this->db->where("lubricator_numberId", $lubricator_numberId);
        }

        $result = $this->db->from("lubricator_number")->count_all_results();
        if($result > 0){
            return false;
        }

        return true;
    }

    function getUpdate($lubricator_numberId){
        $this->db->select("lubricator_numberId,lubricator_number,lubricator_typeId,	lubricator_gear");
        return $this->db->where('lubricator_numberId',$lubricator_numberId)->get("lubricator_number")->row();
    }

    function getAllLubricatorNumberByStatus($status, $lubricator_numberId, $lubricator_gear){
        $this->db->select("lubricator_numberId,lubricator_number,lubricator_gear");
        $this->db->where("status",'1');
        $this->db->where("lubricator_gear", $lubricator_gear);
        if($lubricator_numberId != null){
            $this->db->or_where("lubricator_numberId", $lubricator_numberId);
        }
        $this->db->order_by("lubricator_gear", "asc");
        $this->db->order_by("lubricator_number", "asc"); 
        $result = $this->db->get("lubricator_number");
        return $result->result();
    }

    function getAllNumberFromGear($lubricator_gear){
        $this->db->select("lubricator_numberId,lubricator_number,lubricator_gear");
        $this->db->where("status",'1');
        $this->db->where("lubricator_gear", $lubricator_gear);
        $this->db->order_by("lubricator_gear", "asc");
        $this->db->order_by("lubricator_number", "asc"); 
        $result = $this->db->get("lubricator_number");
        return $result->result();
    }

    function getArrayLubricatorBrand($lubricator_number){
        $this->db->where('lubricator_numberId', $lubricator_number);
        $query = $this->db->get('lubricator');
        $arrayLubricatorBrand = [];
        foreach ($query->result() as $i => $v) {
            $arrayLubricatorBrand[] = $v->lubricator_brandId;
        }
        return $arrayLubricatorBrand;
    }

    function getAllBrandFromNumber($lubricator_number){
        $arrayLubricatorBrand = $this->getArrayLubricatorBrand($lubricator_number);
        
        $this->db->select('lubricator_brandId, lubricator_brandName');
        $this->db->where_in('lubricator_brandId', $arrayLubricatorBrand);
        $query = $this->db->get('lubricator_brand');
        return $query->result();
    }

}