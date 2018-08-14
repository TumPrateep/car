<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class spare_undercarriageDatas extends CI_Model{
    function allSpareData_count(){
        $query = $this
                ->db
                ->get('spare_undercarriagedata');
    
        return $query->num_rows();
    }
    function allSpareData($limit,$start,$order,$dir){
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($order,$dir)
            ->get('spare_undercarriagedata');
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
    }
    function SpareData_search($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price){
        $price = explode(",",$price);
        $this->db->select('spare_brand.spare_brandId,spare_undercarriage.spare_undercarriageId,spare_undercarriageData.price');
        $this->db->join('spare_brand','spare_brand.spare_brandId = spare_undercarraigeData.spare_brandId');
        $this->db->join('spare_undercarriage','spare_undercarriage.spare_undercarriageId = spare_undercarriageData.spare_undercarriageId');
        $this->db->like('spare_undercarriageData.spare_brandId',$spare_brandId);
        $this->db->like('spare_undercarriageData.spare_undercarriageId',$spare_undercarriageId);
        $this->db->where('tire_data.price >=',$price[0]);
        $this->db->where('tire_data.price <=',$price[1]);
        if($status != null){
            $this->db->where("spare_undercarriageData.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($order,$dir)
                ->get('spare_undercarriagedata');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function SpareDatas_search_count($spares_undercarriageId, $spares_brandId, $price){
        $price = explode(",",$price);
        $this->db->select('spare_brand.spare_brandId,spare_undercarriage.spare_undercarriageId,spare_undercarriageData.price');
        $this->db->join('spare_brand','spare_brand.spare_brandId = spare_undercarraigeData.spare_brandId');
        $this->db->join('spare_undercarriage','spare_undercarriage.spare_undercarriageId = spare_undercarriageData.spare_undercarriageId');
        $this->db->like('spare_undercarriageData.spare_brandId',$spare_brandId);
        $this->db->like('spare_undercarriageData.spare_undercarriageId',$spare_undercarriageId);
        $this->db->where('tire_data.price >=',$price[0]);
        $this->db->where('tire_data.price <=',$price[1]);
        if($status != null){
            $this->db->where("spare_undercarriageData.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        return $query->num_rows();   
    }
}