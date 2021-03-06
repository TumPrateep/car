<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Model extends CI_Model{

    function allModel_count($brandId)
    {   
        $this->db->where("brandId", $brandId);
        $query = $this->db->get('model');
    
        return $query->num_rows();  

    }
    
    function allModel($limit,$start,$col,$dir,$brandId)
    {   
       $this->db->where("brandId", $brandId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('model');
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function model_search($limit,$start,$search, $year, $status ,$col,$dir,$brandId)
    {
        $this->db->like('modelName',$search);

        if($year != null){
            $this->db->group_start();
            $this->db->group_start();
                $this->db->where('yearStart <=' ,$year)
                ->where('yearEnd >=' ,$year);
            $this->db->group_end();
                $this->db->or_where('yearStart' ,$year);
            $this->db->group_end();
        }

        if($status != null){
            $this->db->where("status", $status);
        }

        $query = $this->db->where("brandId", $brandId)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('model');

        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function model_search_count($search, $brandId)
    {
        $query = $this->db
            ->where("(`modelName` LIKE '%".$search."%' or  `yearStart` LIKE '%".$search."%' or `yearEnd` LIKE '%".$search."%') and `brandId` = ".$brandId,null,false)
            // ->like('modelName',$search)
            // ->or_like('yearStart',$search
            // ->or_like('yearEnd',$search)
            // ->where("brandId", $brandId)
            ->get('model');
    
        return $query->num_rows();

    }
     

    
    function insert($data){
        $result = $this->db->insert('model', $data);
        return $result;
    }
    
    function data_check_create($brandId,$modelName,$yearStart,$yearEnd,$detail){
        $this->db->select("modelName");
        $this->db->from("model");
        $this->db->where('modelName', $modelName);
        $this->db->where('brandId', $brandId);
        $this->db->where('detail', $detail);
        // $this->db->group_start();
        //     if($yearEnd != null){
        //         $this->db->group_start();
        //             $this->db->group_start();
        //                 $this->db->where('yearStart <=' ,$yearStart)
        //                 ->where('yearEnd >=' ,$yearStart);
        //             $this->db->group_end();

        //             $this->db->or_group_start()
        //                 ->where('yearStart <=' ,$yearEnd)
        //                 ->where('yearEnd >=' ,$yearEnd);
        //             $this->db->group_end();
        //         $this->db->group_end();

        //         $this->db->or_group_start();
        //             $this->db->where('yearStart >=' ,$yearStart)
        //             ->where('yearEnd <=' ,$yearEnd);
        //         $this->db->group_end();

        //     }else{
        //         $this->db->or_group_start();
        //             $this->db->where('yearStart <=' ,$yearStart)
        //             ->where('yearEnd >=' ,$yearStart);
        //         $this->db->group_end();

        //         $this->db->or_where('yearStart' ,$yearStart);
        //     }
        // $this->db->group_end();
        $this->db->where('yearStart' ,$yearStart);
        if($yearEnd != null){
            $this->db->where('yearEnd' ,$yearEnd);
        }
        $result = $this->db->get();
        return $result->row();
    }

    function get_modelbyId($modelId){
        $this->db->select("modelId");
        $this->db->from("model");
        $this->db->where('modelId', $modelId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

    function getModelbyId($modelId){
        return $this->db->where('modelId',$modelId)->get('model')->row();
        // $this->db->select("*");
        // $this->db->where("modelId", $modelId);
        // $this->db->where('brandId','1');
        // $query = $this->db->get("model");
        // return $query->result();
    }

    function delete($modelId){
        return $this->db->delete('model', array('modelId' => $modelId));
    }

    function update($data){
        $this->db->where('modelId',$data['modelId']);
        $result = $this->db->update('model', $data);
        return $result;
    }

    function data_check_update($modelId,$modelName,$yearStart, $yearEnd,$brandId,$detail){
        $this->db->select("modelName");
        $this->db->from("model");
        $this->db->where('modelName', $modelName);
        $this->db->where('brandId', $brandId);
        $this->db->where('detail', $detail);
        // $this->db->group_start();
        //     if($yearEnd != null){
        //         $this->db->group_start();
        //             $this->db->group_start();
        //                 $this->db->where('yearStart <=' ,$yearStart)
        //                 ->where('yearEnd >=' ,$yearStart);
        //             $this->db->group_end();

        //             $this->db->or_group_start()
        //                 ->where('yearStart <=' ,$yearEnd)
        //                 ->where('yearEnd >=' ,$yearEnd);
        //             $this->db->group_end();
        //         $this->db->group_end();

        //         $this->db->or_group_start();
        //             $this->db->where('yearStart >=' ,$yearStart)
        //             ->where('yearEnd <=' ,$yearEnd);
        //         $this->db->group_end();

        //     }else{
        //         $this->db->or_group_start();
        //             $this->db->where('yearStart <=' ,$yearStart)
        //             ->where('yearEnd >=' ,$yearStart);
        //         $this->db->group_end();

        //         $this->db->or_where('yearStart' ,$yearStart);
        //     }
        // $this->db->group_end();
        $this->db->where('yearStart' ,$yearStart);
        if($yearEnd != null){
            $this->db->where('yearEnd' ,$yearEnd);
        }
        $this->db->where_not_in('modelId', $modelId);
        $result = $this->db->get();
        return $result->row();
    }

    function updateStatus($modelId,$data){
        $this->db->where('modelId',$modelId);
        $result = $this->db->update('model', $data);
        return $result; 
    }

    function checkStatusFromModelCar($modelId,$status,$userId){
        $this->db->from('model');
        $this->db->where('modelId',$modelId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return true ;
        }
        return false;
    }
    
    function getAllModelByBrandId($brandId){
        $this->db->select("modelId,modelName,yearStart,yearEnd");
        $this->db->where("brandId", $brandId);
        $this->db->where('status','1');
        $this->db->order_by('modelName', 'ASC');
        $query = $this->db->get("model");
        return $query->result();
    }

    function getAllmodel($brandId){
        $this->db->select("modelId,modelName,yearStart,yearEnd");
        $this->db->where("brandId", $brandId);
        $this->db->where('status','1');
        $this->db->group_by('modelName');
        $this->db->order_by("modelName","asc");
        $query = $this->db->get("model");
        return $query->result();
    }

    function getAllYear($detail){
        $this->db->select("yearStart,yearEnd");
        $this->db->where("detail",$detail);
        $this->db->where('status','1');
        $query = $this->db->get("model");
        return $query->result();

    }
    
    function getAlldetail($modelName){
        $this->db->select("detail");
        $this->db->where("modelName", $modelName);
        $this->db->where('status','1');
        $this->db->group_by('detail');
        $this->db->order_by("detail","asc");
        $query = $this->db->get("model");
        return $query->result();
    }

    function getAllYearForSelect($modelName){
        $this->db->select("modelId, yearStart, yearEnd, detail");
        $this->db->where("modelName", $modelName);
        $this->db->where('status','1');
        $this->db->order_by("detail","asc");
        $query = $this->db->get("model");
        return $query->result();
    }

    function getAllYearanddetailforcar($modelName){
        $this->db->select("modelId, yearStart, yearEnd")->select("IFNULL(`detail`, '') AS `detail`", false);
        $this->db->where("modelName", $modelName);
        // $this->db->where('status','1');
        $this->db->order_by("detail","asc");
        $query = $this->db->get("model");
        return $query->result();
    }

    function getAllActiveYearanddetailforcar($modelName){
        $this->db->select("modelId, yearStart, yearEnd")->select("IFNULL(`detail`, '') AS `detail`", false);
        $this->db->where("modelName", $modelName);
        $this->db->where('status','1');
        $this->db->order_by("detail","asc");
        $query = $this->db->get("model");
        return $query->result();
    }

    function getAllActiveModelforcar($brandId){
        $this->db->select("modelId,modelName,yearStart,yearEnd");
        $this->db->where("brandId", $brandId);
        $this->db->where('status','1');
        $this->db->group_by('modelName');
        $this->db->order_by("modelName","asc");
        $query = $this->db->get("model");
        return $query->result();
    }

    function getAllmodelforcar($brandId){
        $this->db->select("modelId,modelName,yearStart,yearEnd");
        $this->db->where("brandId", $brandId);
        // $this->db->where('status','1');
        $this->db->group_by('modelName');
        $this->db->order_by("modelName","asc");
        $query = $this->db->get("model");
        return $query->result();
    }

    function getMinFromModel($modelName){
        $this->db->select("min(yearStart) as minYear");
        $this->db->where("modelName", $modelName);
        $this->db->where('status','1');
        $this->db->order_by("detail","asc");
        $query = $this->db->get("model");
        return $query->row('minYear');
    }

    function getMaxFromModel($modelName){
        $this->db->select("max(yearEnd) as maxYear");
        $this->db->where("modelName", $modelName);
        $this->db->where('status','1');
        $this->db->order_by("detail","asc");
        $query = $this->db->get("model");
        return $query->row('maxYear');
    }

    function getCarTypeFromModel($modelName){
        $this->db->where("modelName", $modelName);
        $query = $this->db->get("model");
        return $query->row('car_type');
    }

    function getModelByYear($brandId, $modelName, $year){
        $this->db->from("model");
        $this->db->where('model.status','1');
        $this->db->where('model.brandId',$brandId);
        $this->db->where("model.modelName", $modelName);
        $this->db->group_start();
            $this->db->group_start();
                $this->db->where('model.yearStart <=' ,$year)
                ->where('model.yearEnd >=' ,$year);
            $this->db->group_end();
                $this->db->or_where('model.yearStart' ,$year);
            $this->db->group_end();
        $query = $this->db->get();
        
        return $query->result();
    }

    function getModelOfCarByYear($brandId, $modelName, $year){
        $this->db->from("modelofcar");
        $this->db->join('model', 'modelofcar.modelId = model.modelId');
        $this->db->where('modelofcar.status','1');
        $this->db->where('modelofcar.brandId',$brandId);
        $this->db->where("model.modelName", $modelName);
        $this->db->group_start();
            $this->db->group_start();
                $this->db->where('model.yearStart <=' ,$year)
                ->where('model.yearEnd >=' ,$year);
            $this->db->group_end();
                $this->db->or_where('model.yearStart' ,$year);
            $this->db->group_end();

        $this->db->order_by('modelofcar.machineSize', 'ASC');
        $this->db->order_by('modelofcar.modelofcarName', 'ASC');
        $query = $this->db->get();
        
        return $query->result();
    }

}