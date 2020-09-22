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
        $this->db->select('lubricator_matching.lubricator_matching_id, lubricator_matching.status, lubricator_matching.lubricator_gear, lubricator_matching.mileage,
        lubricator_number.lubricator_number, brand.brandName, model.modelName,model.yearStart, model.yearEnd, model.detail'); 
        $this->db->from('lubricator_matching');
        $this->db->join('brand', 'lubricator_matching.brand_id = brand.brandId');
        $this->db->join('model', 'lubricator_matching.model_id = model.modelId');
        // $this->db->join('modelofcar', 'lubricator_matching.detail = modelofcar.modelofcarId');
        $this->db->join('lubricator_number', 'lubricator_matching.lubricator_number = lubricator_number.lubricator_numberId');
       
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();

        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return [];
        }  
    }

    function data_check_create($detail, $lubricator_number){
        $this->db->where("detail", $detail);
        $this->db->where("lubricator_number", $lubricator_number);
        $query = $this->db->get("lubricator_matching")->row();
        return ($query == null)?false:true;
    }

    function insert($data){
        $this->db->trans_begin();
            foreach ($data['lubricator_number'] as $key => $lubricator_number) {
                $model = $data['model'];
                $model['lubricator_number'] = $lubricator_number;
                $isDuplicate = $this->data_check_create($model['detail'], $lubricator_number);
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