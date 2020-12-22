<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Export extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('tiredatas');
    }
	
	public function export_tire()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=ราคายางรถยนต์' . time() . '.csv');
		$output = fopen("php://output", "w");
        
        $userId = $this->session->userdata['logged_in']['id'];
		$data = $this->tiredatas->getAllTireDara($userId);
		
		fputs($output, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
		fputcsv($output, array('ลำดับ', 'รหัสตัวแทน', 'รายละเอียดยางรถยนต์', 'ราคา'));
		foreach ($data as $key => $row) {
			fputcsv($output, array($key+1, $row->tire_dataId, $row->tire_brandName.' '.$row->tire_modelName.' '.$row->tire_size, $row->price));
		}
        fclose($output);
    }
}