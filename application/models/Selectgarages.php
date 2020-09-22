<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Selectgarages extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function select_lubricator_garage_search_count($machineId, $service = 3)
    {

        $this->db->from("garage");
        $this->db->join("lubricator_change_garage", "garage.garageId = lubricator_change_garage.garageId");

        $this->db->where("lubricator_change_garage.machine_id", $machineId);
        $this->db->where("garage.view", 1);

        if ($service != null) {
            if ($service == 1) {
                $this->db->where("garageService like '1__'");
            } else if ($service == 2) {
                $this->db->where("garageService like '_1_'");
            } else {
                $this->db->where("garageService like '__1'");
            }
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function select_lubricator_garage_search($limit, $start, $order, $dir, $machineId, $service = 3, $latitude = null, $longitude = null)
    {
        if (!empty($latitude) && !empty($longitude)) {
            $this->db->select("*, (2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) * 1.609344) as distance");
        } else {
            $this->db->select('*');
        }

        $this->db->from("garage");
        $this->db->join("lubricator_change_garage", "garage.garageId = lubricator_change_garage.garageId");

        $this->db->where("lubricator_change_garage.machine_id", $machineId);
        $this->db->where("garage.view", 1);

        if ($service != null) {
            if ($service == 1) {
                $this->db->where("garageService like '1__'");
            } else if ($service == 2) {
                $this->db->where("garageService like '_1_'");
            } else {
                $this->db->where("garageService like '__1'");
            }
        }

        $this->db->limit($limit, $start);
        if (!empty($latitude) && !empty($longitude)) {
            $this->db->order_by('distance', 'asc');
        } else {
            $this->db->order_by($order, $dir);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function select_garage_search($limit, $start, $order, $dir, $rimId, $service = 2, $latitude = null, $longitude = null)
    {
        if (!empty($latitude) && !empty($longitude)) {
            $this->db->select("*, (2 * 3961 * asin(sqrt( power((sin(radians(($latitude - latitude) / 2))) , 2) + cos(radians(latitude)) * cos(radians($latitude)) * power((sin(radians(($longitude - longtitude) / 2))) , 2) )) * 1.609344) as distance");
        } else {
            $this->db->select('*');
        }

        $this->db->from("garage");
        $this->db->join("tire_change_garage", "garage.garageId = tire_change_garage.garageId");

        $this->db->where("tire_change_garage.rimId", $rimId);
        $this->db->where("garage.view", 1);

        if ($service != null) {
            if ($service == 1) {
                $this->db->where("garage.garageService like '1__'");
            } else if ($service == 2) {
                $this->db->where("garage.garageService like '_1_'");
            } else {
                $this->db->where("garage.garageService like '__1'");
            }
        }

        $this->db->limit($limit, $start);
        if (!empty($latitude) && !empty($longitude)) {
            $this->db->order_by('distance', 'asc');
        } else {
            $this->db->order_by($order, $dir);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function select_garage_search_count($rimId, $service = 2)
    {

        $this->db->from("garage");
        $this->db->join("tire_change_garage", "garage.garageId = tire_change_garage.garageId");

        $this->db->where("tire_change_garage.rimId", $rimId);
        $this->db->where("garage.view", 1);

        if ($service != null) {
            if ($service == 1) {
                $this->db->where("garageService like '1__'");
            } else if ($service == 2) {
                $this->db->where("garageService like '_1_'");
            } else {
                $this->db->where("garageService like '__1'");
            }
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

}