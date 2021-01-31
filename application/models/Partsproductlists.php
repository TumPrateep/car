<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Partsproductlists extends CI_Model{

    function update($partId, $table_list_id){
        $this->db->trans_begin();

        $this->db->where('partId', $partId);
        $this->db->update('parts_product_list', ["status" => 2]);

        foreach ($table_list_id as $list_id) {
            $this->db->where('partId', $partId);
            $data = $this->db->where('parts_table_list_id', $list_id)->get('parts_product_list')->row();
            if(!empty($data)){
                $this->db->where('partId', $partId);
                $this->db->where('parts_table_list_id', $list_id);
                $this->db->update('parts_product_list', ["status" => 1]);
            }else{
                $this->db->insert('parts_product_list', [
                    'partId' => $partId,
                    'parts_table_list_id' => $list_id,
                    'status' => 1
                ]);
            }
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function getPartTable($partId){
        $this->db->where('partId', $partId);
        $this->db->where('status', 1);
        $result = $this->db->get('parts_product_list');
        return $result->result();
    }

}