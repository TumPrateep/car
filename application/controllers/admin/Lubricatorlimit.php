<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Lubricatorlimit extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->view("lib");
    }

    public function garagegroup()
    {
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/lubricatorlimit/content");
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/lubricatorlimit/script");
    }

    public function lubricatorcharge($groupId)
    {
        $data['groupId'] = $groupId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/lubricatorlimit/lubricatorcharge/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/lubricatorlimit/lubricatorcharge/script");
    }

    public function createLubricatorCharge($groupId)
    {
        $data['groupId'] = $groupId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/lubricatorlimit/lubricatorcharge/create/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/lubricatorlimit/lubricatorcharge/create/script");
    }

    public function updateLubricatorCharge($limitId, $groupId)
    {
        $data['limitId'] = $limitId;
        $data['groupId'] = $groupId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/lubricatorlimit/lubricatorcharge/update/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/lubricatorlimit/lubricatorcharge/update/script");
    }
    

}