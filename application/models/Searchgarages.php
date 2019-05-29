<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Searchgarages extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }
    function getgarageById($garageId){
        return $this->db->where('garageId',$garageId)->get("garage")->row();
    }

    function allgarage_count($latitude,$longitude,$dataType=null){
        if(!empty($latitude) && !empty($longitude)){
            $this->db->select("2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) as distance, garage.*");
        }   
        if($dataType != null){
            if($dataType["spare"] == 1){
                $this->db->where("garageService like '1__'");
            }
            if($dataType["tire"] == 1){
                $this->db->where("garageService like '_1_'");
            }
            if($dataType["lubricator"] == 1){
                $this->db->where("garageService like '__1'");
            }
        }
        $query = $this->db->get('garage');
        return $query->num_rows();  
    }

    function allgarage($limit,$start,$col,$dir,$latitude,$longitude,$dataType=null){   
        if(!empty($latitude) && !empty($longitude)){
            $this->db->select("2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) as distance, garage.*");
        }
        if($dataType != null){
            if($dataType["spare"] == 1){
                $this->db->where("garageService like '1__'");
            }
            if($dataType["tire"] == 1){
                $this->db->where("garageService like '_1_'");
            }
            if($dataType["lubricator"] == 1){
                $this->db->where("garageService like '__1'");
            }
        }
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)
            ->get('garage');
        
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }   
    }

      
    // function allgarage($limit,$start,$col,$dir,$garageId){
    //     $this->db->select('garageId,garageName,businessRegistration,garageAddress,postCode,subdistrictId,districtId,provinceId,latitude,longtitude');
    //     $this->db->from('garage');
    //     $this->db->where("garageId",$garageId);

    //     $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
    //     if($query->num_rows()>0){
    //         return $query->result(); 
    //     }else{
    //         return null;
    //     }
        
    // }
    // function allgarage_count($garageId){  
    //     $this->db->select('garageId');
    //     $this->db->from('garage');
    //     $this->db->where("garageId",$garageId);
    //     $query = $this->db->get();
    //     return $query->num_rows();  
                                                                                                                                                                                                
    // }
    
    function garage_search($limit,$start,$col,$dir,$garageName,$provinceId,$districtId,$subdistrictId,$brandId,$service,$latitude,$longitude,$dataType=null)
    {
        if(!empty($latitude) && !empty($longitude)){
            $this->db->select("2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) as distance, garage.*");
        }
        $this->db->like('garageName',$garageName);
        if($provinceId != null){
            $this->db->where("provinceId", $provinceId);
        }
        if($districtId != null){
            $this->db->where("districtId", $districtId);
        }
        if($subdistrictId != null){
            $this->db->where("subdistrictId", $subdistrictId);
        }
        if($brandId != null){
            $this->db->where("brandId", $brandId);
        }
        if($service != null){
            if($service == 1){
                $this->db->where("garageService like '1__'");
            }else if($service == 2){
                $this->db->where("garageService like '_1_'");
            }else{
                $this->db->where("garageService like '__1'");
            }
        }
        if($dataType != null){
            if($dataType["spare"] == 1){
                $this->db->where("garageService like '1__'");
            }
            if($dataType["tire"] == 1){
                $this->db->where("garageService like '_1_'");
            }
            if($dataType["lubricator"] == 1){
                $this->db->where("garageService like '__1'");
            }
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('garage');
        
        if($query->num_rows()>0){
            return $query->result();  
        }else{
            return null;
        }
        
    }

    function garage_search_count($garageName,$provinceId,$districtId,$subdistrictId,$brandId,$service,$latitude,$longitude,$dataType=null){
        if(!empty($latitude) && !empty($longitude)){
            $this->db->select("2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) as distance, garage.*");
        }
        $this->db->like('garageName',$garageName);
        if($provinceId != null){
            $this->db->where("provinceId", $provinceId);
        }
        if($districtId != null){
            $this->db->where("districtId", $districtId);
        }
        if($subdistrictId != null){
            $this->db->where("subdistrictId", $subdistrictId);
        }
        if($brandId != null){
            $this->db->where("brandId", $brandId);
        }
        if($service != null){
            $this->db->where("garageService", $service);
        }
        if($dataType != null){
            if($dataType["spare"] == 1){
                $this->db->where("garageService like '1__'");
            }
            if($dataType["tire"] == 1){
                $this->db->where("garageService like '_1_'");
            }
            if($dataType["lubricator"] == 1){
                $this->db->where("garageService like '__1'");
            }
        }
        $query = $this->db->get('garage');
        return $query->num_rows();
    }

}