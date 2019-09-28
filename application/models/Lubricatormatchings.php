<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatormatchings extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function all_count(){
        $query = $this->db->get('lubricator_matching');
        return $query->num_rows();  
    }

    function allLubricatorMatching($limit,$start,$col,$dir)
    {  
        $this->db->select('lubricator_matching.lubricator_matching_id, lubricator_matching.status, lubricator_matching.model_name, machine.machine_type, 
        lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_number.lubricator_number, lubricator_capacity.capacity, brand.brandName'); 
        $this->db->from('lubricator_matching');
        $this->db->join('brand', 'lubricator_matching.brand_id = brand.brandId');
        $this->db->join('lubricator', 'lubricator_matching.lubricator_id = lubricator.lubricatorId');
        $this->db->join('lubricator_number', 'lubricator_number.lubricator_numberId = lubricator.lubricator_numberId');
        $this->db->join('machine', 'lubricator_matching.machine_id = machine.machineId');
        $this->db->join('lubricator_brand','lubricator_brand.lubricator_brandId = lubricator.lubricator_brandId');
        $this->db->join('lubricator_capacity', 'lubricator.capacity_id = lubricator_capacity.capacity_id', 'left');

        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();

        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return [];
        }  
    }

    function data_check_create($model_name, $lubricator_id){
        $this->db->where("model_name", $model_name);
        $this->db->where("lubricator_id", $lubricator_id);
        $query = $this->db->get("lubricator_matching")->row();
        return ($query == null)?false:true;
    }

    function insert($data){
        $this->db->trans_begin();
            foreach ($data['lubricator_id'] as $key => $lubricator_id) {
                $model = $data['model'];
                $model['lubricator_id'] = $lubricator_id;
                $isDuplicate = $this->data_check_create($model['model_name'], $lubricator_id);
                if(!$isDuplicate){
                    $this->db->insert('lubricator_matching', $model);
                }
            }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

    function update($data){
        $this->db->where('lubricator_matching_id',$data['lubricator_matching_id']);
        $result = $this->db->update('lubricator_matching', $data);
        return $result;
    }

    function delete($lubricator_matching_id){
        return $this->db->delete('lubricator_matching', array('lubricator_matching_id' => $lubricator_matching_id));
    }

    function getlubricatorMatchingById($lubricator_matching_id){
        $this->db->where("lubricator_matching_id", $lubricator_matching_id);
        $query = $this->db->get("lubricator_matching");
        return $query->row();
    }

    function updateStatus($lubricator_matching_id, $data){
        $this->db->where('lubricator_matching_id',$lubricator_matching_id);
        $result = $this->db->update('lubricator_matching', $data);
        return $result; 
    }

}