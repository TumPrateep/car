<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Managegarages extends CI_Model {
   
    function getmanagegaragesById($garageId){
       //ถ้ามีfrom แล้ว ใน get() ตอน return ไม่ต้อวใส่ ค่า ว่าเราเอามาจากไหนแล้ว
        $this->db->from('garage');
        $this->db->join('brand','brand.brandId = garage.brandId','left');
        return $this->db->where('garageId',$garageId)->get()->row();
      
    }
  
    function allmanagegarages_count()
    {   
        $query = $this
                ->db
                ->get('garage');
    
        return $query->num_rows();  
    }

    function allmanagegarages($limit,$start,$col,$dir)
    {  
 
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('garage');
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
        
    }
  
    function data_check_update($garageId,$businessRegistration){
        $this->db->select("businessRegistration");
        $this->db->from("garage");
        $this->db->where('businessRegistration', $businessRegistration);
        $this->db->where_not_in('garageId', $garageId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('garageId',$data['garageId']);
        $result = $this->db->update('garage', $data);
        return $result;
    }
    
}