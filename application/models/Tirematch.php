<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tirematch extends CI_Model{
    
    function allTirematching_count(){  
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tiresize, modelofcar.modelofcarName,model.yearStart, model.yearEnd, modelofcar.machineSize')->select("IFNULL(`detail`, '') AS `detail`", false);        
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_matching.rimId');
        $query = $this->db->get();
        // dd($this->db->last_query());
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allTirematching($limit,$start,$col,$dir){
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tiresize, modelofcar.modelofcarName,model.yearStart, model.yearEnd, modelofcar.machineSize')->select("IFNULL(`detail`, '') AS `detail`", false);        
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_matching.rimId');

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
        
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tiresize, modelofcar.modelofcarName, model.yearStart, model.yearEnd, modelofcar.machineSize')->select("IFNULL(`detail`, '') AS `detail`", false);        
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_matching.rimId');
//
        $this->db->like('concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName)',$search);
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
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tiresize, modelofcar.modelofcarName,model.yearStart, model.yearEnd, modelofcar.machineSize')->select("IFNULL(`detail`, '') AS `detail`", false);        
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_matching.rimId');

        $this->db->like('concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName)',$search);
        if($status != null){
            $this->db->where("tire_matching.status", $status);
        }
        // $query = $this->db->limit($limit,$start)
        //         ->order_by($col,$dir)
        //         ->get();
        $query = $this->db->get();
        return $query->num_rows();
    } 

    function checkduplicate($rimId,$brandId,$modelId,$tire_sizeId,$modelofcarId){
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tiresize, modelofcar.modelofcarName');        
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_matching.rimId');

        $this->db->where('tire_matching.brandId',$brandId);
        $this->db->where('tire_matching.rimId',$rimId);
        $this->db->where('tire_matching.modelId',$modelId);
        $this->db->where('tire_matching.modelofcarId',$modelofcarId);
        $this->db->where('tire_matching.tire_sizeId',$tire_sizeId);
        $result = $this->db->get();
        return $result->row();
    }
    

    // function insert($data){
    //     return $this->db->insert('tire_matching',$data);
    // }

    function insert($data){
        $this->db->trans_begin();
            foreach ($data["modelofcarId"] as $modelofcarId) {
                foreach ($data["tire_sizeId"] as $key => $tireSizeId) {

                    $tiredata = $data["model"];

                    $tiredata["tire_sizeId"] = $tireSizeId;
                    $tiredata["modelofcarId"] = $modelofcarId;

                    $isTrue = $this->data_check_create($tiredata['rimId'],$tiredata['brandId'],$tireSizeId,$tiredata['modelId'],$tiredata['tire_matchingId']);
                    if(!$isTrue){
                        $this->db->insert('tire_matching',$tiredata);
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

    function checkduplicateSameId($rimId,$brandId,$modelId,$tire_sizeId,$tire_matchingId){
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tiresize, modelofcar.modelofcarName');        
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_matching.rimId');

        $this->db->where('tire_matching.brandId',$brandId);
        $this->db->where('tire_matching.rimId',$rimId);
        $this->db->where('tire_matching.modelId',$modelId);
        $this->db->where('tire_matching.tire_sizeId',$tire_sizeId);
        $this->db->where_not_in('tire_matching.tire_matchingId',$tire_matchingId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('tire_matchingId',$data['tire_matchingId']);
        $result = $this->db->update('tire_matching',$data);
        return $result;
    }
    
    function getTireMatchingbyId($tire_matchingId){
        $this->db->select('tire_matching.tire_matchingId,tire_matching.brandId,tire_matching.modelId,tire_matching.rimId,tire_matching.tire_sizeId,tire_matching.modelofcarId,model.detail,model.modelName');
        $this->db->join('model','tire_matching.modelId = model.modelId');
        $this->db->where('tire_matchingId',$tire_matchingId);
        $result = $this->db->get('tire_matching')->row();
        return $result;
    }
    function checkTireMatching($tire_matchingId){
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

    function data_check_create($rimId,$brandId,$modelId,$tire_sizeId,$modelofcarId){
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tiresize, modelofcar.modelofcarName');        
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_matching.rimId');

        $this->db->where('tire_matching.brandId',$brandId);
        $this->db->where('tire_matching.rimId',$rimId);
        $this->db->where('tire_matching.modelId',$modelId);
        $this->db->where('tire_matching.modelofcarId',$modelofcarId);
        $this->db->where('tire_matching.tire_sizeId',$tire_sizeId);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($rimId,$brandId,$modelId,$tire_sizeId,$tire_matchingId){
        $this->db->select('tire_matching.tire_matchingId, tire_matching.status, brand.brandName, model.modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tiresize, modelofcar.modelofcarName');        
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');
        $this->db->join('brand', 'model.brandId = brand.brandId');
        $this->db->join('modelofcar', 'tire_matching.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_matching.tire_sizeId');
        $this->db->join('rim','rim.rimId = tire_matching.rimId');

        $this->db->where('tire_matching.brandId',$brandId);
        $this->db->where('tire_matching.rimId',$rimId);
        $this->db->where('tire_matching.modelId',$modelId);
        $this->db->where('tire_matching.tire_sizeId',$tire_sizeId);
        $this->db->where_not_in('tire_matching.tire_matchingId',$tire_matchingId);
        $result = $this->db->get();
        return $result->row();
    }

    function getAllBrandforSelect(){
        $this->db->select("tire_matching.brandId,brand.brandName");
        $this->db->join('brand','brand.brandId = tire_matching.brandId');
        $this->db->where('tire_matching.status','1');
        $query = $this->db->get("tire_matching");
        return $query->result();
    }

    function getAllmodelforSelect($brandId){
        $this->db->select("tire_matching.modelId,model.modelName");
        $this->db->join('model','model.modelId = tire_matching.modelId');
        $this->db->where('tire_matching.status','1');
        $this->db->where('tire_matching.brandId',$brandId);
        $query = $this->db->get("tire_matching");
        return $query->result();
    }

    function getAllmodelofcarforSelect($modelId){
        $this->db->select("tire_matching.modelofcarId,modelofcar.modelofcarName,modelofcar.machineSize,modelofcar.machineCode");
        $this->db->join('modelofcar','modelofcar.modelofcarId = tire_matching.modelofcarId');
        $this->db->where('tire_matching.status','1');
        $this->db->where('tire_matching.modelId',$modelId);
        $query = $this->db->get("tire_matching");
       
        return $query->result();
    }

    function getAllYear_get($modelId){
        $this->db->select("model.yearStart,model.yearEnd");
        $this->db->join('model','model.modelId = tire_matching.modelId');
        $this->db->where("tire_matching.modelId", $modelId);
        $this->db->where('tire_matching.status','1');
        $query = $this->db->get("tire_matching");
        return $query->result();

    }

    function getTireSizeByModelOfCarId($modelofcarId){
        $this->db->from('tire_matching');
        $this->db->where('modelofcarId', $modelofcarId);
        $query = $this->db->get();
        return $query->result();
    }
}