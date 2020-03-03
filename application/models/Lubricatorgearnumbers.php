<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorgearnumbers extends CI_Model {

    function allLubricatorgearnumbers_count(){   
        $query = $this->db->get('lubricator_gear_number');
        return $query->num_rows();                                                                                                                                                                                     
    }

    function data_check_create($lubricatorgearnumber, $lubricatorGear){
        $this->db->where("number", $lubricatorgearnumber);
        $this->db->where("typeId", $lubricatorGear);
        $result = $this->db->from("lubricator_gear_number")->get();
        return $result->row();
    }

    function allLubricatorgearnumbers($limit,$start,$col,$dir)
    {  
        $this->db->select('numberId, number, typeId, status'); 
        $this->db->from('lubricator_gear_number');
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
    }

    function lubricatorgearnumbers_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->select('numberId, number, typeId, status');
        $this->db->from('lubricator_gear_number');
        
        $this->db->like('number',$search);
        if($status != null){
            $this->db->where("status", $status);
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

    function lubricatorgearnumbers_search_count($search,$status)
    {
        $this->db->select('numberId, number, typeId, status');
        $this->db->from('lubricator_gear_number');
        
        $this->db->like('number',$search);
        if($status != null){
            $this->db->where("status", $status);
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    function  insert($data){
        return $this->db->insert('lubricator_gear_number', $data);
    }

    function getlubricatorgearnumbersById($lubricator_numberId){
        return $this->db->where('numberId',$lubricator_numberId)->get("lubricator_gear_number")->row();
    }

    function delete($lubricator_numberId){
        $this->db->where("numberId",$lubricator_numberId );
        return $this->db->delete('lubricator_gear_number');
    }

    function updateStatus($lubricator_numberId,$data){
        $this->db->where('numberId',$lubricator_numberId);
        $result = $this->db->update('lubricator_gear_number', $data);
        return $result; 
    }

    function getUpdate($lubricator_numberId){
        $this->db->select('numberId, number, typeId, status');
        return $this->db->where('numberId',$lubricator_numberId)->get("lubricator_gear_number")->row();
    }

    function data_check_update($lubricator_numberId, $lubricatorgearnumber, $lubricatorGear){
        $this->db->where("number", $lubricatorgearnumber);
        $this->db->where("typeId", $lubricatorGear);
        $this->db->where_not_in("numberId", $lubricator_numberId);
        $result = $this->db->from("lubricator_gear_number")->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('numberId',$data['numberId']);
        $result = $this->db->update('lubricator_gear_number', $data);
        return $result;
    }

    function getAllLubricatorNumberByStatus($status, $lubricator_gear){
        $this->db->select("numberId, number, typeId");
        $this->db->where("status",'1');
        $this->db->where("typeId", $lubricator_gear);
        // if($lubricator_numberId != null){
        //     $this->db->or_where("lubricator_numberId", $lubricator_numberId);
        // }
        $this->db->order_by("numberId", "asc");
        $this->db->order_by("number", "asc"); 
        $result = $this->db->get("lubricator_gear_number");
        return $result->result();
    }

    ///

    // function wherenotLubricatorNumber($lubricator_numberId,$lubricator_number){
    //     $this->db->select("lubricator_number");
    //     $this->db->from("lubricator_number");
    //     $this->db->where('lubricator_number', $lubricator_number);
    //     $this->db->where_not_in('lubricator_numberId', $lubricator_numberId);
    //     $result = $this->db->count_all_results();
    //     if($result > 0){
    //         return false;
    //     }
    //     return true;
    // }

    // function CheckStatus($lubricator_numberId,$userId,$status){
    //     $this->db->from("lubricator_number");
    //     $this->db->where('lubricator_numberId',$lubricator_numberId);
    //     $this->db->where('create_by',$userId);
    //     $this->db->where('status',$status);
    //     $this->db->where('activeFlag',2);
    //     $result = $this->db->count_all_results();
    //     if($result){
    //         return true;
    //     }
    //     return false;
    // }
    // function checkLubricatorNumberCarAcc($lubricator_number, $lubricator_gear, $lubricator_numberId){
    //     $this->db->where("lubricator_number", $lubricator_number);
    //     $this->db->where("lubricator_gear", $lubricator_gear);

    //     if($lubricatorNumberId != null){
    //         $this->db->where("lubricator_numberId", $lubricator_numberId);
    //     }

    //     $result = $this->db->from("lubricator_number")->count_all_results();
    //     if($result > 0){
    //         return false;
    //     }

    //     return true;
    // }

    // function getAllLubricatorNumberByStatus($status, $lubricator_numberId, $lubricator_gear){
    //     $this->db->select("lubricator_numberId,lubricator_number,lubricator_gear");
    //     $this->db->where("status",'1');
    //     $this->db->where("lubricator_gear", $lubricator_gear);
    //     if($lubricator_numberId != null){
    //         $this->db->or_where("lubricator_numberId", $lubricator_numberId);
    //     }
    //     $this->db->order_by("lubricator_gear", "asc");
    //     $this->db->order_by("lubricator_number", "asc"); 
    //     $result = $this->db->get("lubricator_number");
    //     return $result->result();
    // }

}