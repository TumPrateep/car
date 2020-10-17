<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('payments');
		// $this->load->view("lib");
    }
    
    public function request($orderId, $money){
        // saleId+orderId+amount+ SecretKey[response]
        $saleId = 'ef1dbec1e555b8416e6bf8e7396e1edbc91a8952e80f95cda6a3d2ef3917296a';
        $merchantId = '37222';
        $secrteKey = "SaltTEPS";
        $money = $money."00";

        $integrityStr = hash('sha256', $saleId.$merchantId.$orderId.$money.$secrteKey);

        // echo $secrteKey."<br>";

        // echo $integrityStr."<br>";

        // echo "1ed3e39c125f6603b5bc136ffbfea66779def9ff9850b87ee03f2a7bc5488e60";

        $parameter = "projectCode=TEPS&command=RequestOrderTepsApi&sid=ef1dbec1e555b8416e6bf8e7396e1edbc91a8952e80f95cda6a3d2ef3917296a&redirectUrl=https://carjaidee.com/payment/savePayment&merchantId=37222&orderId=".$orderId."&purchaseAmt=".($money)."&currency=THB&paymentMethod=&productDesc=&smsMobile=&mobileNo=&smsFlag=N&tokenKey=&orderExpire=720&integrityStr=".$integrityStr;

        $url = "https://sandbox.mpay.co.th/mpay-sandbox-api/InterfaceService?";
        
        // Open the file using the HTTP headers set above
        redirect($url.$parameter);
    }
    
    public function savePayment($userId)
    {
        $input = $this->input->post();
        // { ["tranId"]=> string(5) "11176" ["respDesc"]=> string(7) "Success" ["amount"]=> string(6) "319500" ["saleId"]=> string(5) "11176" ["orderId"]=> string(2) "55" ["incCustomerFee"]=> string(1) "0" ["excCustomerFee"]=> string(4) "1500" ["paymentCode"]=> string(10) "0070011176" ["exchangeRate"]=> string(6) "100000" ["orderExpireDate"]=> string(14) "20200701202341" ["purchaseAmt"]=> string(6) "319500" ["currency"]=> string(3) "THB" ["respCode"]=> string(4) "0000" ["paymentStatus"]=> string(7) "SUCCESS" ["status"]=> string(1) "S" }
        $string = json_encode($input);

        // $userId = $this->session->userdata['logged_in']['id'];
        $data = array();
        $orderId = $input['orderId'];
        $date = date('Y-m-d', time());
        $time = date('H:i:s', time());
        $btransfer = "Credit Card";
        $money = intval ($input['amount'])/100;
 
        // $paymentdetail = $this->payments->getPaymentId($orderId);

        $data = array(
            'orderId' => $orderId,
            'created_by' => $userId,
            'date' => $date,
            'time' => $time,
            'created_at' => date('Y-m-d H:i:s', time()),
            'receivebank' => $btransfer,
            'transferbankId' => $input['tranId'],
            'transfer' => $btransfer,
            'status' => 2,
            'money' => $money,
            'detail' => $string
        );

        // $option = [
        //     "data_check_update" => $paymentdetail,
        //     "data_check" => null,
        //     "data" => $data,
        //     "model" => $this->payments,
        // ];

        $this->payments->insert_credit($data);
        // send_line_message(implode(" ",$data));
        redirect('user/order');
    }
    
}