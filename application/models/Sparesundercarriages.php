<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Sparesundercarriages extends CI_Model{

    function allsparesUndercarriages_count()
    {   
        $query = $this
                ->db
                ->get('spares_undercarriage');
    
        return $query->num_rows();  

    }

    function allsparesUndercarriage($limit,$start,$col,$dir)
    {   
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)
            ->get('spares_undercarriage');

        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function sparesUndercarriage_search($limit,$start,$search,$col,$dir,$status)
    {

        $this->db->like('spares_undercarriageName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }

        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('spares_undercarriage');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function sparesUndercarriage_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('spares_undercarriageName',$search)
                ->where('status',$status)
                ->get('spares_undercarriage');
    
        return $query->num_rows();
    }

    function insert($data){
        $result = $this->db->insert('spares_undercarriage', $data);
        return $result;
    }
    function data_check_create($spares_undercarriageName) {
        $this->db->from("spares_undercarriage");
        $this->db->where('spares_undercarriageName',$spares_undercarriageName);
        $result = $this->db->get();
        return $result->row();

    }
    function delete($spares_undercarriageId){
        return $this->db->delete('spares_undercarriage', array('spares_undercarriageId' => $spares_undercarriageId));
    }
    function getsparesUndercarriagebyId($spares_undercarriageId){
        return $this->db->where('spares_undercarriageId',$spares_undercarriageId)->get("spares_undercarriage")->row();
    }

    function data_check_update($spares_undercarriageId,$spares_undercarriageName){
            $this->db->select("spares_undercarriageName");
            $this->db->from("spares_undercarriage");
            $this->db->where('spares_undercarriageName', $spares_undercarriageName);
            $this->db->where_not_in('spares_undercarriageId', $spares_undercarriageId);
            $result = $this->db->get();
            return $result->row();
        }

        function update($data){
                $this->db->where('spares_undercarriageId',$data['spares_undercarriageId']);
                $result = $this->db->update('spares_undercarriage', $data);
                return $result;
            }

        
        function updateStatus($spares_undercarriageId,$data){
            $this->db->where('spares_undercarriageId',$spares_undercarriageId);
            $result = $this->db->update('spares_undercarriage', $data);
            return $result; 
        }
        function checkUserIdFromSpareUnderCarriages($userId){
            $this->db->select("*");
            $this->db->from("spares_undercarriage");
            $this->db->where('create_by', $userId);
            $result = $this->db->count_all_results();
    
            if($result > 0){
                return false;
            }
            return true;
        }
        function checkStatusFromSpareUnderCarriages($spares_undercarriageId,$status,$userId){
           
            $this->db->from("spares_undercarriage");
            $this->db->where('status', $status);
            $this->db->where('create_by', $userId);
            $this->db->where('spares_undercarriageId', $spares_undercarriageId);
            $this->db->where('activeFlag',2);
            $result = $this->db->count_all_results();
    
            if($result > 0){
                return true;
            }
            return false;
        }

       function getAllSpareundercarriage(){
            $this->db->select("spares_undercarriageId,spares_undercarriageName");
            $this->db->order_by("spares_undercarriageName","ASC");
            $query = $this->db->get("spares_undercarriage");
            return $query->result();
       }

        function checksparesUndercarriage($spares_undercarriageId){
            $this->db->select("spares_undercarriageId");
            $this->db->from("spares_undercarriage");
            $result = $this->db->count_all_results();

            if($result > 0){
                return true;
            }
            return false;
        }

        function getUpdate($spares_undercarriageId){
            $this->db->select("spares_undercarriageId,spares_undercarriageName");
            return $this->db->where('spares_undercarriageId',$spares_undercarriageId)->get("spares_undercarriage")->row();
        }

}