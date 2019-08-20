<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Sparespictures extends CI_Model{

    function allData_count(){
        $query = $this->db->get('spares_picture');
        return $query->num_rows();  
    }

    function allData($limit,$start,$order,$dir){

        //$this->db->select("spare_product.productId,spares_undercarriage.spares_undercarriageName, spares_brand.spares_brandName, concat(brand.brandName,' ',model.modelName ) name ,model.yearStart,model.yearEnd,modelofcar.machineSize,modelofcar.modelofcarName, spare_product.status, spare_product.picture");
        $this->db->select("spares_picture.spare_pictire_id, spares_picture.picture, spares_undercarriage.spares_undercarriageName, spares_brand.spares_brandName");
        $this->db->from('spares_picture');
        $this->db->join('spares_undercarriage','spares_picture.spares_undercarriageId  = spares_undercarriage.spares_undercarriageId');
        $this->db->join('spares_brand','spares_picture.spares_brandId = spares_brand.spares_brandId');

        $this->db->limit($limit,$start)->order_by($order,$dir);
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function data_check_create($spares_undercarriageId,$spares_brandId){
        $this->db->select('spare_pictire_id');
        $this->db->where('spares_undercarriageId', $spares_undercarriageId);
        $this->db->where('spares_brandId', $spares_brandId);
        // $this->db->where('brandId', $brandId);
        // $this->db->where('modelId', $modelId);
        // $this->db->where('modelofcarId', $modelofcarId);
        $query = $query = $this->db->get('spares_picture');
        return $query->row();
    }

    function insert($data){
        return $this->db->insert('spares_picture',$data);
    }

    function update($data){
        $this->db->where('spare_pictire_id',$data['spare_pictire_id']);
        $result = $this->db->update('spares_picture', $data);
        return $result;
    }

    function getSparepictireById($spare_pictire_id){
        $query = $this->db->where("spare_pictire_id", $spare_pictire_id)->get("spares_picture");
        return $query->row();
    }


    function getSpareById($spare_pictire_id){
        $this->db->where('spare_pictire_id',$spare_pictire_id);
        $result = $this->db->get("spares_picture");
        return $result->row();
    }

    function getUpdate($spare_pictire_id){
        $this->db->select('spare_pictire_id, spares_undercarriageId, spares_brandId, picture');
        $this->db->where('spare_pictire_id',$spare_pictire_id);
        $result = $this->db->get("spares_picture")->row();
        return $result;
    }

    function data_check_update($spare_pictire_id,$spares_undercarriageId){
        $this->db->from("spares_picture");
        $this->db->where('spares_undercarriageId',$spares_undercarriageId);
        $this->db->where_not_in('spare_pictire_id',$spare_pictire_id);
        $result = $this->db->get();
        return $result->row();
    }

    function delete($spare_pictire_id){
        return $this->db->delete('spares_picture', array('spare_pictire_id' => $spare_pictire_id));
    }

    function sparesUndercarriage_search($limit,$start,$search,$col,$dir,$spares_brandName)
    {
        $this->db->select("spares_picture.spare_pictire_id, spares_picture.picture, spares_undercarriage.spares_undercarriageName, spares_brand.spares_brandName");
        $this->db->from('spares_picture');
        $this->db->join('spares_undercarriage','spares_picture.spares_undercarriageId  = spares_undercarriage.spares_undercarriageId');
        $this->db->join('spares_brand','spares_picture.spares_brandId = spares_brand.spares_brandId');

        $this->db->like('spares_undercarriage.spares_undercarriageName',$search);
        $this->db->like('spares_brand.spares_brandName',$spares_brandName);


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
    function sparesUndercarriage_search_count($search, $spares_brandName)
    {
        $this->db->select("spares_picture.spare_pictire_id, spares_picture.picture, spares_undercarriage.spares_undercarriageName, spares_brand.spares_brandName");
        $this->db->from('spares_picture');
        $this->db->join('spares_undercarriage','spares_picture.spares_undercarriageId  = spares_undercarriage.spares_undercarriageId');
        $this->db->join('spares_brand','spares_picture.spares_brandId = spares_brand.spares_brandId');

        $this->db->like('spares_undercarriage.spares_undercarriageName',$search);
        $this->db->like('spares_brand.spares_brandName',$spares_brandName);
        $query = $this->db->get();
        return $query->num_rows();
    }

}