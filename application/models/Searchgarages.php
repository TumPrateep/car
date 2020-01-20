<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Searchgarages extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getgarageById($garageId)
    {
        return $this->db->where('garageId', $garageId)->get("garage")->row();
    }

    public function allgarage_count($latitude, $longitude)
    {
        $number = 0;
        if (!empty($latitude) && !empty($longitude)) {
            $this->db->select("(2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) * 1.609344) as distance, garage.*");
            $this->db->where("(2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) * 1.609344) <= ", 10);
            $this->db->where('garage.view', 1);
            $query = $this->db->get('garage');
            $number = $query->num_rows();
        }
        return $number;
    }

    public function allgarage($limit, $start, $col, $dir, $latitude, $longitude)
    {
        $result = null;
        if (!empty($latitude) && !empty($longitude)) {
            $this->db->select("(2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) * 1.609344) as distance, garage.*");
            $this->db->where("(2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) * 1.609344) <= ", 10);
            $this->db->where('garage.view', 1);
            $query = $this->db->limit($limit, $start)->order_by($col, $dir)
                ->get('garage');
            if ($query->num_rows() > 0) {
                $result = $query->result();
            }
        }

        return $result;
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

    public function garage_search($limit, $start, $col, $dir, $garageName, $provinceId, $districtId, $brandId, $service, $latitude, $longitude)
    {
        if (!empty($latitude) && !empty($longitude)) {
            $this->db->select("(2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) * 1.609344) as distance, garage.*");
        }

        $this->db->like('garageName', $garageName);
        if ($provinceId != null) {
            $this->db->where("provinceId", $provinceId);
        }
        if ($districtId != null) {
            $this->db->where("districtId", $districtId);
        }
        if ($brandId != null) {
            $this->db->where("brandId", $brandId);
        }
        if ($service != null) {
            if ($service == 1) {
                $this->db->where("garageService like '1__'");
            } else if ($service == 2) {
                $this->db->where("garageService like '_1_'");
            } else {
                $this->db->where("garageService like '__1'");
            }
        }
        $this->db->where('garage.view', 1);

        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('garage');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function garage_search_count($garageName, $provinceId, $districtId, $brandId, $service, $latitude, $longitude)
    {
        if (!empty($latitude) && !empty($longitude)) {
            $this->db->select("(2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) * 1.609344) as distance, garage.*");
        }

        $this->db->like('garageName', $garageName);
        if ($provinceId != null) {
            $this->db->where("provinceId", $provinceId);
        }
        if ($districtId != null) {
            $this->db->where("districtId", $districtId);
        }
        if ($brandId != null) {
            $this->db->where("brandId", $brandId);
        }
        if ($service != null) {
            if ($service == 1) {
                $this->db->where("garageService like '1__'");
            } else if ($service == 2) {
                $this->db->where("garageService like '_1_'");
            } else {
                $this->db->where("garageService like '__1'");
            }
        }
        $this->db->where('garage.view', 1);

        $query = $this->db->get('garage');
        return $query->num_rows();
    }

}