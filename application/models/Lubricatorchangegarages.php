<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Lubricatorchangegarages extends CI_Model{
    // insert
    function insert($data){
        return $this->db->insert('lubricator_change_garage',$data);
    }
    function data_check_create($garageId){
        $this->db->from("lubricator_change_garage");
        $this->db->where("garageId",$garageId);
        $result = $this->db->get();
        return $result->row();
    }

    // update
    function getUpdate($lubricator_changeId){
        $this->db->select('lubricator_changeId,lubricator_price');
        $this->db->where('lubricator_changeId',$lubricator_changeId);
        $result = $this->db->get("lubricator_change_garage")->row();
        return $result;
    }
    function data_check_update($lubricator_changeId,$garageId){
        $this->db->from("lubricator_change_garage");
        $this->db->where("garageId",$garageId);
        $this->db->where_not_in('lubricator_changeId',$lubricator_changeId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('lubricator_changeId',$data['lubricator_changeId']);
        $result = $this->db->update('lubricator_change_garage', $data);
        return $result;
    }

    // delete
    function delete($lubricator_changeId){
        return $this->db->delete('lubricator_change_garage', array('lubricator_changeId' => $lubricator_changeId));
    }
    function getLubricatorChangeById($lubricator_changeId){
        $this->db->select("lubricator_changeId");
        $this->db->where('lubricator_changeId',$lubricator_changeId);
        $result = $this->db->get("lubricator_change_garage");
        return $result->row();
    }

    // search เข้ามาครั้งเเรก ใช้ดึงข้อมูลมาเเสดง คู่กันกับ allLubricatorschanges_count + funtion search ข้อมูล
    function allLubricatorchanges($limit,$start,$col,$dir,$garageId){
        $this->db->select('lubricator_changeId,lubricator_price,status,garageId');
        $this->db->from('lubricator_change_garage');
        $this->db->where("garageId",$garageId);

        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }
    function allLubricatorschanges_count($garageId){  
        $this->db->select('lubricator_changeId');
        $this->db->from('lubricator_change_garage');
        $this->db->where("garageId",$garageId);
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    // lubricatorchanges_search ,lubricatorchanges_search_count ใช้ในการ search ข้อมูล
    function lubricatorchanges_search($limit,$start,$search,$col,$dir,$status,$garageId){
        
        $this->db->select('lubricator_changeId, lubricator_price, status,garageId');
        $this->db->from('lubricator_change');
        $this->db->where("garageId",$garageId);
        if($search != null){
            $this->db->where("lubricator_price",$search);
        }
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
                
        if($query->num_rows()>0){
            return $query->result();  
        }else{
            return null;
        }
    }
    function lubricatorchanges_search_count($search,$status,$garageId){
       
        $this->db->select('lubricator_changeId, lubricator_price, status');
        $this->db->from('lubricator_change');
        $this->db->where("garageId",$garageId);
        if($search != null){
            $this->db->where("lubricator_price",$search);
        }
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 


}