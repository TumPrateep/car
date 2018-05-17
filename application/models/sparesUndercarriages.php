<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class sparesUndercarriages extends CI_Model{

    function allsparesUndercarriages_count()
    {   
        $query = $this
                ->db
                ->get('spares_undercarriage');
    
        return $query->num_rows();  

    }
    
    function allsparesUndercarriage($limit,$start,$col,$dir)
    {   
        $query = $this
            ->db
            ->limit($limit,$start)
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
   
    function sparesUndercarriage_search($limit,$start,$search,$col,$dir,$spares_undercarriageId)
    {
        $this->db->where("spares_undercarriageId", $spares_undercarriageId);
        $query = $this
                ->db
                ->like('spares_undercarriageName',$search)
                ->limit($limit,$start)
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

    function sparesUndercarriage_search_count($search, $spares_undercarriageId)
    {
        $this->db->where("spares_undercarriageId", $spares_undercarriageId);
        $query = $this
                ->db
                ->like('spares_undercarriageName',$search)
                ->get('spares_undercarriage');
    
        return $query->num_rows();
    }

    function insertsparesUndercarriage($data){
        $result = $this->db->insert('spares_undercarriage', $data);
        return $result;
    }

    function getsparesUndercarriageforTF($spares_undercarriageName){
        $this->db->select("spares_undercarriageName");
        $this->db->from("spares_undercarriage");
        $this->db->where('spares_undercarriageName', $spares_undercarriageName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;     
    }

    function wherenotsparesUndercarriage($spares_undercarriageId,$spares_undercarriageName){
        $this->db->select("spares_undercarriageName");
        $this->db->from("spares_undercarriage");
        $this->db->where('spares_undercarriageName', $spares_undercarriageName);
        $this->db->where_not_in('spares_undercarriageId', $spares_undercarriageId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function updatesparesUndercarriage($data){
        $this->db->where('spares_undercarriageId',$data['spares_undercarriageId']);
        $result = $this->db->update('spares_undercarriage', $data);
        return $result;
    }

    

    function delete($spares_undercarriageId){
        return $this->db->delete('spares_undercarriage', array('spares_undercarriageId' => $spares_undercarriageId));
    }

    function checksparesUndercarriage($spares_undercarriageName) {
        $this->db->select("*");
        $this->db->from("spares_undercarriageName");
        $this->db->where('spares_undercarriageName',$spares_undercarriageName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }
    
    function getsparesUndercarriage($spares_undercarriageName){
        return $this->db->where('spares_undercarriageName',$spares_undercarriageName)->get("spares_undercarriage")->row();
    }


    function checksparesUndercarriage($spares_undercarriageName) {
        $this->db->select("*");
        $this->db->from("spares_undercarriage");
        $this->db->where('spares_undercarriageName',$spares_undercarriageName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;

    }

    

   

}