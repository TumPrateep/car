<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Dataoption extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPictureSpare($option)
    {
        $this->db->select("picture");
        $this->db->from("spare_product");
        $this->db->where("spares_undercarriageId", $option['spares_undercarriageId']);
        $this->db->where("spares_brandId", $option['spares_brandId']);
        $this->db->where("brandId", $option['brandId']);
        $this->db->where("modelId", $option['modelId']);
        $this->db->where("modelofcarId", $option['modelofcarId']);
        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit();
        return $query->row();
    }

    public function getPictureTire($option)
    {
        $this->db->select("picture");
        $this->db->from("tire_product_picture");
        $this->db->where("tire_brandId", $option['tire_brandId']);
        $this->db->where("tire_modelId", $option['tire_modelId']);
        // $this->db->where("rimId", $option['rimId']);
        // $this->db->where("tire_sizeId", $option['tire_sizeId']);
        $query = $this->db->get();
        return $query->row();
    }

    public function getPictureLubricator($option)
    {
        $this->db->select("picture");
        $this->db->from("lubricator_product_picture");
        $this->db->where("lubricator_id", $option['lubricatorId']);
        $query = $this->db->get();
        return $query->row();
    }

}