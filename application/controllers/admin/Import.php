<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	function __construct(){
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
		$this->load->model('caraccessories');
    }

    function index()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/import/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/import/script");
    }

    function tire($car_accessoriesId)
	{
		$data['car_accessoriesId'] = $car_accessoriesId;
		$data['car_accessories'] = $this->caraccessories->getCarAccessoriesFromCarAccessoriesByUserId($car_accessoriesId);
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/import/tire/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/import/tire/script");
    }

	function tireimport($car_accessoriesId)
	{
		$data['car_accessoriesId'] = $car_accessoriesId;
		$data['car_accessories'] = $this->caraccessories->getCarAccessoriesFromCarAccessoriesByUserId($car_accessoriesId);
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/import/tire/import/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/import/tire/import/script");
	}
	
	public function export_tire($car_accessoriesId)
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=ราคายางรถยนต์' . time() . '.csv');
        $output = fopen("php://output", "w");
        fputs($output, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        fputcsv($output, array('no', 'workplace_id', 'workplace_name', 'workplace_type_code', 'address', 'district', 'province', 'zipcode', 'position', 'condition', 'detail', 'contact'));
        fputcsv($output, array('1', 'รหัสสถานประกอบการ', 'ชื่อสถานประกอบการ', 'ประเภทสถานประกอบการ', 'ที่อยู่', 'อำเภอ', 'จังหวัด', 'รหัสไปรษณีย์', 'ตำแหน่ง','เงื่อนไข' , 'รายละเอียด', 'ติดต่อ'));
        fclose($output);
    }
}
