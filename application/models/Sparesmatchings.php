<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Sparesmatchings extends CI_Model{

    function data_check_create($spares_undercarriage_id, $modelofcar_id, $spares_brand_id){
        $this->db->where('spares_undercarriage_id', $spares_undercarriage_id);
        $this->db->where('modelofcar_id', $modelofcar_id);
        $this->db->where('spares_brand_id', $spares_brand_id);
        $query = $this->db->get('spares_matching')->row();
        return ($query == null)?false:true;
    }

    function insert($data){
        $this->db->trans_begin();
            foreach ($data['spares_undercarriage_id'] as $spares_undercarriage_id) {
                foreach ($data['modelofcar_id'] as $modelofcar_id) {
                    $model = $data["model"];
                    $model['spares_undercarriage_id'] = $spares_undercarriage_id;
                    $model['modelofcar_id'] = $modelofcar_id;

                    $isDuplicate = $this->data_check_create($spares_undercarriage_id, $modelofcar_id, $model['spares_brand_id']);
                    if(!$isDuplicate){
                        $this->db->insert('spares_matching', $model);
                    }
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

    function all_count(){

        $this->db->from("spares_matching");

        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();  
        } else {
            return null;
        }

    }

    function allSparesmatching($limit,$start,$order,$dir){
        $this->db->select('spares_matching.spares_matching_id, spares_matching.status, brand.brandName, model.modelName, model.detail, model.yearStart, model.yearEnd, 
                modelofcar.machineSize, modelofcar.modelofcarName, spares_undercarriage.spares_undercarriageName, spares_brand.spares_brandName');
        $this->db->from("spares_matching");
        $this->db->join("spares_undercarriage", "spares_matching.spares_undercarriage_id = spares_undercarriage.spares_undercarriageId");
        $this->db->join("spares_brand", "spares_matching.spares_brand_id = spares_brand.spares_brandId");
        $this->db->join("modelofcar", "spares_matching.modelofcar_id = modelofcar.modelofcarId");
        $this->db->join("model", "modelofcar.modelId = model.modelId");
        $this->db->join("brand", "brand.brandId = model.brandId");
        $query = $this->db->limit($limit,$start)->order_by($order,$dir)->get();
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }else{
            return null;
        }
    }

    function getSparesMatchingById($spares_matching_id){
        $this->db->where('spares_matching_id', $spares_matching_id);
        $query = $this->db->get('spares_matching');
        return $query->row();
    }

    function update($data){
        $this->db->where('spares_matching_id',$data['spares_matching_id']);
        $result = $this->db->update('spares_matching', $data);
        return $result;
    }

    function delete($spares_matching_id){
        return $this->db->delete('spares_matching', array('spares_matching_id' => $spares_matching_id));
    }
}