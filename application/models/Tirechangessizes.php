<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tirechangessizes extends CI_Model{

    function data_check_create($rimId, $tire_sizeId){
        $this->db->from("tire_size_charge");
        $this->db->join('rim','tire_size_charge.rimId = rim.rimId');
        $this->db->where('tire_size_charge.rimId',$rimId);
        $this->db->where('tire_size_charge.tire_sizeId',$tire_sizeId);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('tire_size_charge',$data);
    }

    function alltrieSize_count($rimId)
    {   
        $this->db->where("rimId", $rimId);
        $query = $this->db->get('tire_size_charge');
        return $query->num_rows();  
    }

    function allTriesize($limit,$start,$col,$dir,$rimId)
    {  
        $this->db->select("tire_size_charge.tire_size_chargeId, tire_size_charge.tire_sizeId, tire_size_charge.rimId, tire_size_charge.tire_size_price, 
        tire_size_charge.status, tire_size.tire_size, tire_size.tire_series, rim.rimName");

        $this->db->where("tire_size_charge.rimId", $rimId);
        $this->db->join('rim','rim.rimId = tire_size_charge.rimId');
        $this->db->join('tire_size','tire_size.tire_sizeId = tire_size_charge.tire_sizeId');

        $query = $this
                 ->db
                 ->limit($limit,$start)
                 ->order_by($col,$dir)
                 ->get('tire_size_charge');
         if($query->num_rows()>0)
         {
             return $query->result(); 
         }
         else
         {
             return null;
         }
        
    }

    function getAllunit(){
        $this->db->select("unit_id,unit");
        $this->db->where('status','1');
        $this->db->order_by('unit', 'asc');
        $query = $this->db->get("unit");
        return $query->result();
    }

    function getAllRims($rimId){
        $this->db->select("rimId,rimName");
        $this->db->where('status','1');
        // $this->db->where('rimId',$rimId);
        $this->db->order_by('rimName', 'asc');
        $query = $this->db->get("rim");
        return $query->result();
    }

    function getUpdate($rimId){
        $this->db->select("rimId, rimName");
        $this->db->where('rimId',$rimId);
        $result = $this->db->get("rim")->row();
        return $result;
    }

    function geTiresizeFromTiresizeBytireId($tire_sizeId, $rimId){
        $this->db->select("tire_size.tire_size,tire_size.tire_series,rim.rimName,rim.rimId,tire_size.tire_sizeId, tire_size.tire_size, tire_size.tire_series, tire_size.status, tire_size_charge.unit_id");    
        $this->db->join('rim','rim.rimId = tire_size.rimId');
        $this->db->join('tire_size_charge','rim.rimId = tire_size_charge.rimId');
        $this->db->where('rim.rimId',$rimId);
        $this->db->where('tire_size.tire_sizeId',$tire_sizeId);
        $result = $this->db->get('tire_size')->row();
        return $result;
    }

    function getTireChangeById($tire_size_chargeId){
        $this->db->select("tire_size_chargeId");
        $this->db->where('tire_size_chargeId',$tire_size_chargeId);
        $result = $this->db->get("tire_size_charge");
        return $result->row();
    }

    function data_check_update($tire_size_chargeId, $rimId, $tire_sizeId){
        $this->db->select("tire_size_chargeId, rimId, tire_sizeId");
        $this->db->from("tire_size_charge");
        // $this->db->join('rim','tire_change.rimId = rim.rimId');
        $this->db->where('rimId',$rimId);
        $this->db->where('tire_sizeId',$tire_sizeId);
        $this->db->where_not_in('tire_size_chargeId',$tire_changeId);
        $result = $this->db->get();
        return $result->row();
    }

/////




    function update($data){
        $this->db->where('tire_changeId',$data['tire_changeId']);
        $result = $this->db->update('tire_change', $data);
        return $result;
    }
    function checkData($tire_changeId){
        $this->db->select("tire_price,rimId");
        return $this->db->where('tire_changeId',$tire_changeId)->get("tire_change")->row(); 
    }
    function delete($tire_changeId){
        return $this->db->delete('tire_change', array('tire_changeId' => $tire_changeId));
    }


}