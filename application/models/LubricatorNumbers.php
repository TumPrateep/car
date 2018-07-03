<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class LubricatorNumbers extends CI_Model {

    function allLubricatorNumbers_count(){   
        $query = $this->db->get('lubricator_number');
        return $query->num_rows();                                                                                                                                                                                     
    }

    function allLubricatorNumbers($limit,$start,$col,$dir)
    {  
        $this->db->select('lubricator_number.lubricator_numberId,lubricator_number.lubricator_number, lubricator_number.lubricator_gear, lubricator_type.lubricator_typeName as lubricator_typeName, lubricator_number.lubricator_typeId, lubricator_number.status'); 
        $this->db->from('lubricator_number');
        $this->db->join('lubricator_type', 'lubricator_number.lubricator_typeId = lubricator_type.lubricator_typeId' , 'left');
        $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        
        // echo $this->db->last_query();
        // exit();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function lubricatorNumber_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->select('lubricator_number.lubricator_numberId,lubricator_number.lubricator_number, lubricator_number.lubricator_gear, lubricator_type.lubricator_typeName as lubricator_typeName, lubricator_number.lubricator_typeId, lubricator_number.status'); 
        $this->db->from('lubricator_number');
        $this->db->join('lubricator_type', 'lubricator_number.lubricator_typeId = lubricator_type.lubricator_typeId' , 'left');
        
        $this->db->like('lubricator_number.lubricator_number',$search);
        if($status != null){
            $this->db->where("lubricator_number.status", $status);
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

    function lubricatorNumber_search_count($search,$status)
    {
        $this->db->select('lubricator_number.lubricator_numberId,lubricator_number.lubricator_number, lubricator_number.lubricator_gear, lubricator_type.lubricator_typeName as lubricator_typeName, lubricator_number.lubricator_typeId, lubricator_number.status'); 
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

    function getLubricatorNumber($lubricator_numberId){
        return $this->db->where('lubricator_numberId',$lubricator_numberId)->get("lubricator_number")->row();
    }

    function delete($lubricator_numberId){
        return $this->db->delete('lubricator_number', array('lubricator_numberId' => $lubricator_numberId));
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

    function updateLubricatorNumber($data){
        $this->db->where('lubricator_numberId',$data['lubricator_numberId']);
        $result = $this->db->update('lubricator_number', $data);
        return $result;
    }
    
    function getlubricatorTypeById($lubricator_numberId){
        $this->db->select("lubricator_numberId,lubricator_number");
        return $this->db->where('lubricator_numberId',$lubricator_numberId)->get("lubricator_number")->row();
    }

    function checkLubricatorNumber($lubricatorNumber, $lubricatorGear, $lubricatorNumberId){
        $this->db->where("lubricator_number", $lubricatorNumber);
        $this->db->where("lubricator_gear", $lubricatorGear);

        if($lubricatorNumberId != null){
            $this->db->where("lubricator_numberId", $lubricatorNumberId);
        }

        $result = $this->db->from("lubricator_number")->count_all_results();
        if($result > 0){
            return false;
        }

        return true;
    }

    function  insertLubricatorNumber($data){
        return $this->db->insert('lubricator_number', $data);
    }
    function CheckStatus($lubricator_numberId,$userId,$status){
        $this->db->from('lubricator_number');
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

        if($lubricatorNumberId != null){
            $this->db->where("lubricator_numberId", $lubricator_numberId);
        }

        $result = $this->db->from("lubricator_number")->count_all_results();
        if($result > 0){
            return false;
        }

        return true;
    }

}