<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Sparechanges extends CI_Model{

    function data_check_create($spares_undercarriageId, $brandId){
        $this->db->from("spares_change");
        $this->db->where('spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('brandId',$brandId);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($spares_changeId,$spares_undercarriageId, $brandId){
        $this->db->from("spares_change");
        $this->db->where('spares_undercarriageId',$spares_undercarriageId);
        $this->db->where('brandId',$brandId);
        $this->db->where_not_in('spares_changeId',$spares_changeId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('spares_changeId',$data['spares_changeId']);
        $result = $this->db->update('spares_change', $data);
        return $result;
    }

    function getSpareChangeById($spares_changeId){
        $this->db->select("spares_changeId");
        $this->db->where('spares_changeId',$spares_changeId);
        $result = $this->db->get("spares_change");
        return $result->row();
    }

    function getSpareChangePrice(){
        $this->db->select("spares_undercarriageId,spares_price");
        $result = $this->db->get("spares_change");
        return $result->result();
    }

    function insert($data){
        $this->db->trans_begin();
            $brandId = $data["data"]["brandId"];
            $this->db->delete('spares_change', array('brandId' => $brandId));
            
            foreach ($data["data"]["spares_undercarriageId"] as $key => $row) {
                $tempData = $data["simple"];
                $tempData["spares_undercarriageId"] = $row;
                $tempData["brandId"] = $brandId;
                $tempData["spares_price"] = $data["data"]["spares_price"][$key];
                $this->db->insert('spares_change',$tempData);
            }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

    function allSparechanges($limit,$start,$col,$dir,$brandId){
        $this->db->select('spares_change.spares_changeId, spares_change.spares_price, spares_undercarriage.spares_undercarriageName, spares_change.status,brand.brandName,brand.brandId');
        $this->db->from('spares_change');
        $this->db->join('spares_undercarriage', 'spares_undercarriage.spares_undercarriageId = spares_change.spares_undercarriageId');
        $this->db->join('brand', 'brand.brandId = spares_change.brandId');
        $this->db->where('brand.brandId', $brandId);
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function allSparechanges_count($brandId){  
        $this->db->select('spares_change.spares_changeId, spares_change.spares_price, spares_undercarriage.spares_undercarriageName, spares_change.status,brand.brandName,brand.brandId');
        $this->db->from('spares_change');
        $this->db->join('spares_undercarriage', 'spares_undercarriage.spares_undercarriageId = spares_change.spares_undercarriageId');
        $this->db->join('brand','brand.brandId = spares_change.brandId');
        $this->db->where('brand.brandId', $brandId);
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function sparechanges_search($limit,$start,$search,$col,$dir,$status){
        
        $this->db->select('spares_change.spares_changeId, spares_change.spares_price, spares_undercarriage.spares_undercarriageName, spares_change.status,brand.brandName,brand.brandId');
        $this->db->from('spares_change');
        $this->db->join('spares_undercarriage', 'spares_undercarriage.spares_undercarriageId = spares_change.spares_undercarriageId');
        $this->db->join('brand', 'brand.brandId = spares_change.brandId');
        if($search != null){
            $this->db->where("spares_change.spares_undercarriageId",$search);
        }
        if($status != null){
            $this->db->where("tire_change.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
                
        if($query->num_rows()>0){
            return $query->result();  
        }else{
            return null;
        }
    }

    function sparechanges_search_count($search,$status){
       
        $this->db->select('spares_change.spares_changeId, spares_change.spares_price, spares_undercarriage.spares_undercarriageName, spares_change.status,brand.brandName,brand.brandId');
        $this->db->from('spares_change');
        $this->db->join('spares_undercarriage', 'spares_undercarriage.spares_undercarriageId = spares_change.spares_undercarriageId');
        $this->db->join('brand', 'brand.brandId = spares_undercarriage.brandId');
        if($search != null){
            $this->db->where("spares_change.spares_undercarriageId",$search);
        }
        if($status != null){
            $this->db->where("tire_change.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 

    function getUpdate($spares_changeId){
        $this->db->select('spares_change.spares_changeId, spares_change.spares_price, spares_change.spares_undercarriageId,spares_change.brandId');
        $this->db->where('spares_changeId',$spares_changeId);
        $result = $this->db->get("spares_change")->row();
        return $result;
    }

    function delete($spares_changeId){
        return $this->db->delete('spares_change', array('spares_changeId' => $spares_changeId));
    }

     function getBrand(){
        $this->db->select('brandId,brandName');
        $this->db->from('brand');
        $this->db->where('status',1);
        $this->db->order_by("brandName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    function getAllSpareCharge($brandId){
        $this->db->select('spares_change.spares_changeId, spares_change.spares_price, spares_undercarriage.spares_undercarriageId, spares_undercarriage.spares_undercarriageName, spares_change.status,brand.brandName,brand.brandId');
        $this->db->from("spares_undercarriage");
        $this->db->join('spares_change', 'spares_undercarriage.spares_undercarriageId = spares_change.spares_undercarriageId and spares_change.brandId = '.$brandId, "left");
        $this->db->join('brand','brand.brandId = spares_change.brandId', "left");
        // $this->db->where('brand.brandId', $brandId);
        $query = $this->db->get();
        return $query->result();
    }
}