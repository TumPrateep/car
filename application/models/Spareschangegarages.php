<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Spareschangegarages extends CI_Model{
    // insert
    function insert($data){
        return $this->db->insert('spares_change_garage',$data);
    }
    function data_check_create($garageId,$spares_undercarriageId){
        $this->db->from("spares_change_garage");
        $this->db->where("garageId",$garageId);
        $this->db->where("spares_undercarriageId",$spares_undercarriageId);
        $result = $this->db->get();
        return $result->row();
    }

    // update
    function getUpdate($spares_changeId){
        $this->db->select('spares_changeId,spares_price, spares_undercarriageId');
        $this->db->where('spares_changeId',$spares_changeId);
        $result = $this->db->get("spares_change_garage")->row();
        return $result;
    }
    function data_check_update($spares_changeId,$garageId,$spares_undercarriageId){
        $this->db->from("spares_change_garage");
        $this->db->where("garageId",$garageId);
        $this->db->where("spares_undercarriageId",$spares_undercarriageId);
        $this->db->where_not_in('spares_changeId',$spares_changeId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('spares_changeId',$data['spares_changeId']);
        $result = $this->db->update('spares_change_garage', $data);
        return $result;
    }

    // delete
    function delete($spares_changeId){
        return $this->db->delete('spares_change_garage', array('spares_changeId' => $spares_changeId));
    }
    function getSparesChangeById($spares_changeId){
        $this->db->select("spares_changeId");
        $this->db->where('spares_changeId',$spares_changeId);
        $result = $this->db->get("spares_change_garage");
        return $result->row();
    }

    // search เข้ามาครั้งเเรก ใช้ดึงข้อมูลมาเเสดง คู่กันกับ allLubricatorschanges_count + funtion search ข้อมูล
    function allSpareschanges($limit,$start,$col,$dir,$garageId){
        $this->db->select('spares_change_garage.spares_changeId,spares_change_garage.spares_price,spares_change_garage.status,spares_change_garage.garageId,spares_undercarriage.spares_undercarriageName');
        $this->db->from('spares_change_garage');
        $this->db->join('spares_undercarriage', 'spares_undercarriage.spares_undercarriageId = spares_change_garage.spares_undercarriageId');
        $this->db->where("spares_change_garage.garageId",$garageId);

        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }
    function allSpareschanges_count($garageId){  
        $this->db->select('spares_change_garage.spares_changeId,spares_change_garage.spares_price,spares_change_garage.status,spares_change_garage.garageId,spares_undercarriage.spares_undercarriageName');
        $this->db->from('spares_change_garage');
        $this->db->join('spares_undercarriage', 'spares_undercarriage.spares_undercarriageId = spares_change_garage.spares_undercarriageId');
        $this->db->where("spares_change_garage.garageId",$garageId);
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function spareschanges_search($limit,$start,$search,$col,$dir,$status,$garageId){
        
        $this->db->select('spares_change_garage.spares_changeId,spares_change_garage.spares_price,spares_change_garage.status,spares_change_garage.garageId,spares_undercarriage.spares_undercarriageName');
        $this->db->from('spares_change_garage');
        $this->db->join('spares_undercarriage', 'spares_undercarriage.spares_undercarriageId = spares_change_garage.spares_undercarriageId');
        $this->db->where("spares_change_garage.garageId",$garageId);
        if($search != null){
            $this->db->where("spares_change_garage.spares_price",$search);
        }
        if($status != null){
            $this->db->where("spares_change_garage.status", $status);
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
    function spareschanges_search_count($search,$status,$garageId){
       
        $this->db->select('spares_change_garage.spares_changeId,spares_change_garage.spares_price,spares_change_garage.status,spares_change_garage.garageId,spares_undercarriage.spares_undercarriageName');
        $this->db->from('spares_change_garage');
        $this->db->join('spares_undercarriage', 'spares_undercarriage.spares_undercarriageId = spares_change_garage.spares_undercarriageId');
        $this->db->where("spares_change_garage.garageId",$garageId);
        if($search != null){
            $this->db->where("spares_change_garage.spares_price",$search);
        }
        if($status != null){
            $this->db->where("spares_change_garage.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 


}