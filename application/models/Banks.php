<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Banks extends CI_Model{

    function data_check_create($accountNumber){
        $this->db->from("bank_carjaidee");
        $this->db->where("accountNumber",$accountNumber);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($accountNumber,$bankId){
        $this->db->from("bank_carjaidee");
        $this->db->where("accountNumber",$accountNumber);
        $this->db->where_not_in('bankId',$bankId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('bankId',$data['bankId']);
        $result = $this->db->update('bank_carjaidee', $data);
        return $result;
    }

    function getBanksById($bankId){
        $this->db->select("bankId");
        $this->db->where('bankId',$bankId);
        $result = $this->db->get("bank_carjaidee");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('bank_carjaidee',$data);
    }

    function delete($bankId){
        return $this->db->delete('bank_carjaidee', array('bankId' => $bankId));
    }

    function allBank_count(){  
        // $this->db->select('lubricator_change.lubricator_changeId, lubricator_change.lubricator_price, lubricator_change.status');
        $this->db->from('bank_carjaidee');
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function allBank($limit,$start,$col,$dir){
        // $this->db->select('lubricator_changeId,lubricator_price,status');
        $this->db->from('bank_carjaidee');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function Bank_search_count($search,$status){
       
        $this->db->select('bank_carjaidee.bankName, bank_carjaidee.status');
        $this->db->from('bank_carjaidee');
        if($search != null){
            $this->db->where("bank_carjaidee.bankName",$search);
        }
        if($status != null){
            $this->db->where("bank_carjaidee.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 

    function getUpdate($bankId){
        // $this->db->select('bank_carjaidee.bankId,bank_carjaidee.accountNumber,');
        $this->db->where('bankId',$bankId);
        $result = $this->db->get("bank_carjaidee")->row();
        return $result;
    }

}