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
            // ->or_like('yearStart',$search)
            // ->or_like('yearEnd',$search)
            // ->where("brandId", $brandId)
            ->get('model');
    
        return $query->num_rows();
    } 

    
    function insert($data){
        $result = $this->db->insert('model', $data);
        return $result;
    }
    
    function data_check_create($brandId,$modelName,$yearStart,$yearEnd){
        $this->db->select("modelName");
        $this->db->from("model");
        $this->db->where('modelName', $modelName);
        $this->db->where('brandId', $brandId);
        $this->db->group_start();
            if($yearEnd != null){
                $this->db->group_start();
                    $this->db->group_start();
                        $this->db->where('yearStart <=' ,$yearStart)
                        ->where('yearEnd >=' ,$yearStart);
                    $this->db->group_end();

                    $this->db->or_group_start()
                        ->where('yearStart <=' ,$yearEnd)
                        ->where('yearEnd >=' ,$yearEnd);
                    $this->db->group_end();
                $this->db->group_end();

                $this->db->or_group_start();
                    $this->db->where('yearStart >=' ,$yearStart)
                    ->where('yearEnd <=' ,$yearEnd);
                $this->db->group_end();

            }else{
                $this->db->or_group_start();
                    $this->db->where('yearStart <=' ,$yearStart)
                    ->where('yearEnd >=' ,$yearStart);
                $this->db->group_end();

                $this->db->or_where('yearStart' ,$yearStart);
            }
        $this->db->group_end();
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

    function getmodel($modelId){
        $this->db->where('modelId',$modelId);
        $result = $this->db->get('model')->row();
        return $result;
    }

    function delete($modelId){
        return $this->db->delete('model', array('modelId' => $modelId));
    }

    function update($data){
        $this->db->where('modelId',$data['modelId']);
        $result = $this->db->update('model', $data);
        return $result;
    }

    function wherenot($modelId,$modelName,$yearStart, $yearEnd,$brandId){
        $this->db->select("modelName");
        $this->db->from("model");
        $this->db->where('modelName', $modelName);
        $this->db->where('brandId', $brandId);
        $this->db->group_start();
            if($yearEnd != null){
                $this->db->group_start();
                    $this->db->group_start();
                        $this->db->where('yearStart <=' ,$yearStart)
                        ->where('yearEnd >=' ,$yearStart);
                    $this->db->group_end();

                    $this->db->or_group_start()
                        ->where('yearStart <=' ,$yearEnd)
                        ->where('yearEnd >=' ,$yearEnd);
                    $this->db->group_end();
                $this->db->group_end();

                $this->db->or_group_start();
                    $this->db->where('yearStart >=' ,$yearStart)
                    ->where('yearEnd <=' ,$yearEnd);
                $this->db->group_end();

            }else{
                $this->db->or_group_start();
                    $this->db->where('yearStart <=' ,$yearStart)
                    ->where('yearEnd >=' ,$yearStart);
                $this->db->group_end();

                $this->db->or_where('yearStart' ,$yearStart);
            }
        $this->db->group_end();
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
        $this->db->select("modelId,modelName");
        $this->db->where("brandId", $brandId);
        $this->db->order_by('modelName', 'ASC');
        $query = $this->db->get("model");
        return $query->result();
    }

}