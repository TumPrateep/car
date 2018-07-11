<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class tirechanges extends CI_Model{
    function checkDuplicate($tire_front,$tire_back,$rimId){
        $this->db->from("tire_change");
        $this->db->where('tire_front',$tire_front);
        $this->db->where('tire_back',$tire_back);
        $this->db->where('rimId',$rimId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }else
            return true;
    }
    function insert($data){
        return $this->db->insert('tire_change',$data);
    }
    function checkDuplicateById($tire_changeId,$tire_front,$tire_back,$rimId){
        $this->db->select("tire_front,tire_back,rimId");
        $this->db->from("tire_change");
        $this->db->where('tire_front',$tire_front);
        $this->db->where('tire_back',$tire_back);
        $this->db->where('rimId',$rimId);
        $this->db->where_not_in('tire_changeId');
        $result = $this ->db->count_all_results();
        if($result > 0){
            return false;
        }else
            return true;
    }
    function update($data){
        $this->db->where('tire_changeId',$data['tire_changeId']);
        $result = $this->db->update('tire_change', $data);
        return $result;
    }
    function checkData($tire_changeId){
        $this->db->select("tire_front,tire_back,rimId");
        return $this->db->where('tire_changeId',$tire_changeId)->get("tire_change")->row(); 
    }
    function delete($tire_changeId){
        return $this->db->delete('tire_change', array('tire_changeId' => $tire_changeId));
    }
    function getallTire($tire_changeId){
        $this->db->select("tire_front,tire_back,rimId");
        $this->db->where('tire_changeId',$tire_changeId);
        $result = $this->db->get('tire_change')->row();
        return $result;
    }

    function allTirechanges($limit,$start,$col,$dir){
        $this->db->select('tire_change.tire_front, tire_change.tire_back, rim.rimName, tire_change.status, tire_change.tire_changeId, tire_change.status ');
        $this->db->from('tire_change');
        $this->db->join('rim', 'tire_change.rimId = rim.rimId');

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

    function allTirechanges_count(){  
        $this->db->select('tire_change.tire_front, tire_change.tire_back, rim.rimName, tire_change.tire_changeId, tire_change.status ');
        $this->db->from('tire_change');
        $this->db->join('rim', 'tire_change.rimId = rim.rimId');

        $query = $this->db->get();
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function tirechanges_search($limit,$start,$search,$col,$dir,$status){
        
        $$this->db->select('tire_change.tire_front, tire_change.tire_back, rim.rimName, tire_change.tire_changeId, tire_change.status ');
        $this->db->from('tire_change');
        $this->db->join('rim', 'tire_change.rimId = rim.rimId');

        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_change.status", $status);
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

    function tirechanges_search_count($search,$status){
       
        $this->db->select('tire_change.tire_front, tire_change.tire_back, rim.rimName, tire_change.status, tire_change.tire_changeId ');
        $this->db->from('tire_change');
        $this->db->join('rim', 'tire_change.rimId = rim.rimId');
        
        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_change.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
    
        return $query->num_rows();
    } 
   
}