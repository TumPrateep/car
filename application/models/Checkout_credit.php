<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Checkout_credit extends CI_Model
{

    public function insert($data)
    {
        $this->db->trans_begin();
        $this->load->model('tiredatas');
        $this->load->model('lubricatordatas');

        $this->db->insert('order', $data['order']);
        $orderId = $this->db->insert_id();

        $strProduct = '';
        $money = 0;

        foreach ($data['group'] as $i => $v) {

            if($v == 'tire'){
                $tireData = $this->tiredatas->getTireDataById($data['productId'][$i]);
                $minTireData = $this->tiredatas->getMinTireDataById($data['productId'][$i]);
                $strProduct .= $tireData->tire_brandName.' '.$tireData->tire_modelName.' '.$tireData->tire_size.' จำนวน '.$data['number'][$i].' เส้น ';
                $data['orderdetail']['car_accessoriesId'] = $tireData->car_accessoriesId;
                $data['orderdetail']['real_car_accessoriesId'] = $minTireData->car_accessoriesId;
                $data['orderdetail']['real_productId'] = $minTireData->tire_dataId;
                $data['orderdetail']['min_product_price'] = $minTireData->price;
                $data['orderdetail']['group'] = 'tire';
                $data['orderdetail']['real_product_price'] = $minTireData->price * $data['number'][$i];
            }else if($v == 'lubricator'){
                $lubricatorData = $this->lubricatordatas->getlubricatorDatabyId($data['productId'][$i]);
                $minLubricatorData = $this->lubricatordatas->getMinLubricatorDataById($data['productId'][$i]);
                $data['orderdetail']['car_accessoriesId'] = $lubricatorData->create_by;
                $data['orderdetail']['real_car_accessoriesId'] = $minLubricatorData->create_by;
                $data['orderdetail']['real_productId'] = $minLubricatorData->lubricator_dataId;
                $data['orderdetail']['min_product_price'] = $minLubricatorData->price;
                $data['orderdetail']['group'] = 'lubricator';
                $data['orderdetail']['real_product_price'] = $minLubricatorData->price * $data['number'][$i];
            }

            $data['orderdetail']['quantity'] = $data['number'][$i];
            $data['orderdetail']['price_per_unit'] = $data['price_per_unit'][$i];
            $data['orderdetail']['productId'] = $data['productId'][$i];
            $data['orderdetail']['product_price'] = $data['product_price'][$i];
            $data['orderdetail']['charge_price'] = $data['charge_price'][$i];
            $data['orderdetail']['delivery_price'] = $data['delivery_price'][$i];
            $data['orderdetail']['garage_service_price'] = $data['garage_service_price'][$i];
            $data['orderdetail']['carjaidee_service_price'] = $data['charge_price'][$i];
            $data['orderdetail']['orderId'] = $orderId;
            $money += $data['number'][$i]*$data['price_per_unit'][$i];
            $this->db->insert('orderdetail', $data['orderdetail']);

            $this->db->where('productId', $data['productId'][$i]);
            $this->db->where('create_by', $data['userId']);
            $this->db->where('group', $v);
            $this->db->delete('cart');
        }

        $data['reserve']['orderId'] = $orderId;
        $this->db->insert('reserve', $data['reserve']);

        if (!empty($data["payments"])) {
            $data['payments']['orderId'] = $orderId;
            $data['payments']['money'] = $money;
            $this->db->insert('payment', $data['payments']);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $message = "หมายเลขสั่งซื้อ: ".$orderId."\nผู้สั่งซื้อ: ".$data['order']['userId']."\nสินค้าที่สั่ง: ".$strProduct."\nราคารวม: ".$money;
            send_line_message($message);
            $this->db->trans_commit();
            return [
                "url" => gen_credit($orderId, $money, $data['order']['userId']),
            ];
        }
    }

}