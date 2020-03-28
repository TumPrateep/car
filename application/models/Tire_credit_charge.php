<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tire_credit_charge extends CI_Model{

    function allTirechanges($limit,$start,$col,$dir){
        $this->db->select('tire_credit_charge.tire_creditId, tire_credit_charge.credit_price, tire_credit_charge.status, unit.unit');
        $this->db->from('tire_credit_charge');
        $this->db->join('unit','unit.unit_id = tire_credit_charge.unit_id');
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
        $this->db->select('tire_credit_charge.credit_price, tire_credit_charge.status, unit.unit');
        $this->db->from('tire_credit_charge');
        $this->db->join('unit','unit.unit_id = tire_credit_charge.unit_id');
        $query = $this->db->get();
        return $query->num_rows();  
    }

    function insert($data){
        return $this->db->insert('tire_credit_charge',$data);
    }

    function update($data){
        $this->db->where('tire_creditId',$data['tire_creditId']);
        $result = $this->db->update('tire_credit_charge', $data);
        return $result;
    }

    function getTireCredit(){
        return $this->db->get('tire_credit_charge')->row();
    }

    function getTireCreditById($tire_creditId){
        $this->db->where('tire_creditId', $tire_creditId);
        return $this->db->get('tire_credit_charge')->row();
    }

    function delete($tire_creditId){
        return $this->db->delete('tire_credit_charge', array('tire_creditId' => $tire_creditId));
    }

    function getUpdate($tire_creditId){
        $this->db->select("tire_creditId,credit_price,unit_id");
        $this->db->where('tire_creditId',$tire_creditId);
        $result = $this->db->get("tire_credit_charge")->row();
        return $result;
    }
}