<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class TireMatch extends CI_Model{
    
    function allTirematching_count(){  
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size, modelofcar.modelofcarName');
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');

        $query = $this->db->get();
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allTirematching($limit,$start,$col,$dir){
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size, modelofcar.modelofcarName');
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');

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

    function tirematching_search($limit,$start,$search,$col,$dir,$status){
        
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size, modelofcar.modelofcarName');
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');

        $this->db->like('model.modelName',$search);
        if($status != null){
            $this->db->where("tire_matching.status", $status);
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

    function tirematching_search_count($search,$status){
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size, modelofcar.modelofcarName');
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->like('model.modelName',$search);
        if($status != null){
            $this->db->where("tire_matching.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
    
        return $query->num_rows();
    } 

    function checkduplicate($rimId,$brandId,$modelId,$tire_sizeId,$modelofcarId){
        $this->db->select('tire_matching.rimId,tire_matching.brandId,tire_matching.modelId,tire_matching.modelofcarId,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size, modelofcar.modelofcarName');
        $this->db->from('tire_matching');
        $this->db->join('model', 'model.modelId = tire_matching.modelId');
        $this->db->join('brand', 'brand.brandId = tire_matching.brandId');
        $this->db->join('modelofcarId', 'modelofcarId = tire_matching.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->where('tire_matching.brandId',$brandId);
        $this->db->where('tire_matching.rimId',$rimId);
        $this->db->where('tire_matching.modelId',$modelId);
        $this->db->where('tire_macthing.modelofcarId',$modelofcarId);
        $this->db->where('tire_matching.tire_sizeId',$tire_sizeId);
        
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }else{
            return true;
        }
    }

    function insert($data){
        return $this->db->insert('tire_matching',$data);
    }
    function checkduplicateSameId($rimId,$brandId,$modelId,$tire_sizeId,$tire_matchingId){
        $this->db->select('tire_matching.rimId,tire_matching.brandId,tire_matching.modelId,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size');
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->where('tire_matching.brandId',$brandId);
        $this->db->where('tire_matching.rimId',$rimId);
        $this->db->where('tire_matching.modelId',$modelId);
        $this->db->where('tire_matching.tire_sizeId',$tire_sizeId);
        $this->db->where_not_in('tire_matching.tire_matchingId',$tire_matching);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }else{
            return true;
        }
    }

    function update($data,$tire_matchingId){
        $this->db->where('tire_matchingId',$tire_matchingId);
        $result = $this->db->update('tire_matching',$data);
        return $result;
    }
    
    function getTireMatchingbyId($tire_matchingId){
        $this->db->select('tire_matchingId,brandId,modelId,rimId,tire_sizeId');
        $this->db->where('tire_matchingId',$tire_matchingId);
        $result = $this->db->get('tire_matching')->row();
        return $result;
    }
    function checkTireMatching($tire_matchingId){
        $this->db->select('*');
        $this->db->where('tire_matchingId',$tire_matchingId);
        $result = $this->db->get('tire_matching')->row();
        return $result;
    }

    function delete($tire_matchingId){
        return $this->db->delete('tire_matching', array('tire_matchingId' => $tire_matchingId));
    }

    function updateStatus($tire_matchingId, $data){
        $this->db->where('tire_matchingId',$tire_matchingId);
        $result = $this->db->update('tire_matching', $data);
        
        return $result; 
    }
}