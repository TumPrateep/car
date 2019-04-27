<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Orders extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }
    function getAllCartByUserId($userId){
        $this->db->select("*");
        $this->db->where('create_by',$userId);
        $query = $this->db->get("cart");
        return $query->result();
    }

    function getAllCartByUserIdAndProductId($userId, $productData){
        $this->db->select("*");
        $this->db->where('create_by',$userId);
        $this->db->where_in('productId',$productData);
        $query = $this->db->get("cart");
        return $query->result();
    }

    function getCost($productId, $group){
        $cost = null;
        if($group == "tire"){
            $cost = $this->db->where("tire_dataId",$productId)->get("tire_data")->row("price");
        }else if($group == "spare"){
            $cost = $this->db->where("spares_undercarriageDataId",$productId)->get("spares_undercarriagedata")->row("price");
        }else{
            $cost = $this->db->where("lubricator_dataId",$productId)->get("lubricator_data")->row("price");
        }
        return $cost;
    }

    function getCharge($productId, $group){
        $charge = null;
        if($group == "tire"){
            $this->db->select("tire_change.tire_price as charge");
            $this->db->from("tire_data");
            $this->db->join('tire_change','tire_change.rimId = tire_data.rimId');
            $this->db->where("tire_data.tire_dataId",$productId);
            $charge = $this->db->get()->row("charge");
        }else if($group == "spare"){
            $this->db->select("spares_change.spares_price as charge");
            $this->db->from("spares_undercarriagedata");
            $this->db->join('spares_change','spares_change.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
            $this->db->where("spares_undercarriagedata.spares_undercarriageDataId",$productId);
            $charge = $this->db->get()->row("charge");
        }else{
            $this->db->select("lubricator_change.lubricator_price as charge");
            $this->db->from("lubricator_change");
            $charge = $this->db->get()->row("charge");
        }
        return $charge;
    }

    function getCarassoryId($productDetail, $group){
        $createBy = null;
        if($group == "tire"){
            $this->db->from("tire_data");
            $this->db->where("tire_sizeId",$productDetail['tire_sizeId']);
            $this->db->where("tire_brandId",$productDetail['tire_brandId']);
            $this->db->where("tire_modelId",$productDetail['tire_modelId']);
            $this->db->limit(1)->order_by("price","ASC");
            $createBy = $this->db->get()->row("create_by");
        }else if($group == "spare"){
            $this->db->from("spares_undercarriagedata");
            $this->db->where("modelId",$productDetail['modelId']);
            $this->db->where("spares_undercarriageId",$productDetail['spares_undercarriageId']);
            $this->db->where("spares_brandId",$productDetail['spares_brandId']);
            $this->db->where("brandId",$productDetail['brandId']);
            $this->db->where("modelofcarId",$productDetail['modelofcarId']);
            $this->db->limit(1)->order_by("price","ASC");
            $createBy = $this->db->get()->row("create_by");
        }else{
            $this->db->from("lubricator_data");
            $this->db->where("lubricatorId",$productDetail);
            $this->db->limit(1)->order_by("price","ASC");
            $createBy = $this->db->get()->row("create_by");
        }
        return $createBy;
    }

    function getGarageCharge($productId, $group){
        $charge = null;
        if($group == "tire"){
            $this->db->select("tire_change_garage.tire_price as charge");
            $this->db->from("tire_data");
            $this->db->join('tire_change_garage','tire_change_garage.rimId = tire_data.rimId');
            $this->db->where("tire_data.tire_dataId",$productId);
            $charge = $this->db->get()->row("charge");
        }else if($group == "spare"){
            $this->db->select("spares_change_garage.spares_price as charge");
            $this->db->from("spares_undercarriagedata");
            $this->db->join('spares_change_garage','spares_change_garage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
            $this->db->where("spares_undercarriagedata.spares_undercarriageDataId",$productId);
            $charge = $this->db->get()->row("charge");
        }else{
            $this->db->select("lubricator_change_garage.lubricator_price as charge");
            $this->db->from("lubricator_change_garage");
            $charge = $this->db->get()->row("charge");
        }
        return $charge;
    }

    function callDeposit($garageId, $costDelivery, $caraccessoryId, $orderdetail){
        $sum = 0;
        foreach ($orderdetail as $val) {
            $cost =  $this->getCost($val->productId, $val->group);
            $productDetail = getDataForOrderDetail($val->productId, $val->group);
            $tempCaraccessoryId = null;
            if($caraccessoryId == null){
                $tempCaraccessoryId = $this->getCarassoryId($productDetail, $val->group);
            }else{
                $tempCaraccessoryId = $caraccessoryId;
            }

            $costCaraccessories = getCostFromProductDetail($tempCaraccessoryId, $productDetail, $val->group);
            $charge =  $this->getCharge($val->productId, $val->group);
            $chargeGarage =  $this->getGarageCharge($val->productId, $val->group);
            $quantity = $val->quantity;
            $sum += calDeposit($cost,$charge,$chargeGarage,$costCaraccessories)*$quantity;
        }
        return $sum+$costDelivery;
    }

    function insert($data){
        $this->db->trans_begin();
            $userId = $this->session->userdata['logged_in']['id'];
            $caraccessoryId = $data['caraccessoryId'];
            $this->db->insert("order",$data['order']);
            $orderId = $this->db->insert_id();
            $orderDetailData = $data['orderdetail'];
            $orderDetail = [];
            $arrProductId = [];
            foreach ($orderDetailData as $val) {
                $cost =  $this->getCost($val->productId, $val->group);
                $productDetail = getDataForOrderDetail($val->productId, $val->group);
                $tempCaraccessoryId = null;
                if($caraccessoryId == null){
                    $tempCaraccessoryId = $this->getCarassoryId($productDetail, $val->group);
                }else{
                    $tempCaraccessoryId = $caraccessoryId;
                }

                $costCaraccessories = getCostFromProductDetail($tempCaraccessoryId, $productDetail, $val->group);
                $charge =  $this->getCharge($val->productId, $val->group);
                $chargeGarage =  $this->getGarageCharge($val->productId, $val->group);
                $temp = [
                    'orderId' => $orderId,
                    'userId' => $userId,
                    'productId' => $val->productId,
                    'quantity' => $val->quantity,
                    'status' => 1,
                    'activeflag' => 1,
                    'group' => $val->group, 
                    'cost' => $cost,
                    'car_accessoriesId' => $tempCaraccessoryId,
                    'costCaraccessories'=>$costCaraccessories,
                    'charge' => $charge,
                    'chargeGarage' => $chargeGarage,
                    'create_at' => date('Y-m-d H:i:s',time())
                ];
                array_push($orderDetail, $temp);
                array_push($arrProductId, $val->productId);
            }
            $data["reserve"]["orderId"] = $orderId;
            $this->db->insert("reserve",$data['reserve']);

            $this->db->where_in('productId', $arrProductId);
            $this->db->where('create_by', $userId);
            $this->db->delete('cart');

            $this->db->insert_batch('orderdetail', $orderDetail);
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

    function all_count($userId)
    {   
        $query = $this
                ->db
                ->where('create_by',$userId)
                ->get('order');
    
        return $query->num_rows();  
    }
    function searchAllOrder($limit,$start,$col,$dir,$userId)
    {   
        $query = $this
            ->db
            ->where('create_by',$userId)
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('order');

            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
        
    }

    function CheckCar_accessories($cartData){
        $total = ((count($cartData['lubricator']) > 0 )? 1 : 0) + 
            ((count($cartData['spare'])  > 0 )? 1 : 0) + 
            ((count($cartData['tire'])  > 0 )? 1 : 0);

        $isFirst = true;
        $union = "";

        $subQuery1 = null;
        if(count($cartData['lubricator']) > 0){
            // #1 SubQueries no.1 -------------------------------------------
            $this->db->select('create_by, sum(price) as price');
            $this->db->where_in('lubricatorId ', $cartData['lubricator']);
            $this->db->group_by('create_by');
            $this->db->having('COUNT(*)', count($cartData['lubricator']));

            $subQuery1 = $this->db->get_compiled_select('lubricator_data');
            if($isFirst){
                $isFirst = false;
                $union = $union."$subQuery1 ";
            }
        }

        $subQuery2 = null;
        if(count($cartData['tire']) > 0){
            // #2 SubQueries no.2 -------------------------------------------
            $this->db->select('create_by, sum(price) as price');
            foreach ($cartData['tire'] as $row) {
                $this->db->or_group_start();
                    $this->db->where('tire_sizeId', $row['tire_sizeId']);
                    $this->db->where('tire_brandId', $row['tire_brandId']);
                    $this->db->where('tire_modelId', $row['tire_modelId']);
                $this->db->group_end();
            }
            $this->db->group_by('create_by');
            $this->db->having('COUNT(create_by)', count($cartData['tire']));
            $subQuery2 = $this->db->get_compiled_select('tire_data');
            if($isFirst){
                $isFirst = false;
                $union = $union."$subQuery2 ";
            }else{
                $union = $union."union all $subQuery2 ";
            }
        }

        $subQuery3 = null;
        if(count($cartData['spare']) > 0){
            // #3 SubQueries no.3 -------------------------------------------
            $this->db->select('create_by, sum(price) as price');
            foreach ($cartData['spare'] as $row) {
                $this->db->or_group_start();
                    $this->db->where('modelId', $row['modelId']);
                    $this->db->where('spares_undercarriageId', $row['spares_undercarriageId']);
                    $this->db->where('spares_brandId', $row['spares_brandId']);
                    $this->db->where('brandId', $row['brandId']);
                    $this->db->where('modelofcarId', $row['modelofcarId']);
                $this->db->group_end();
            }
            $this->db->group_by('create_by');
            $this->db->having('COUNT(create_by)', count($cartData['spare']));
            $subQuery3 = $this->db->get_compiled_select('spares_undercarriagedata');
            if($isFirst){
                $isFirst = false;
                $union = $union."$subQuery3 ";
            }else{
                $union = $union."union all $subQuery3 ";
            }
            
        }

        $this->db->select('create_by, sum(price) as total');
        $this->db->from("($union) as product");
        $this->db->having('COUNT(create_by)', $total);
        $this->db->group_by('create_by');
        $this->db->order_by("total", "asc");
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->row('create_by');
    }
    
}