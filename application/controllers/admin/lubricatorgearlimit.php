<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class lubricatorgearlimit extends CI_Controller
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
        $this->load->view("admin/lubricatorgearlimit/content");
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/lubricatorgearlimit/script");
    }

    public function lubricatorgearcharge($groupId)
    {
        $data['groupId'] = $groupId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/lubricatorgearlimit/lubricatorgearcharge/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/lubricatorgearlimit/lubricatorgearcharge/script");
    }

    public function createLubricatorGearCharge($groupId)
    {
        $data['groupId'] = $groupId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/lubricatorgearlimit/lubricatorgearcharge/create/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/lubricatorgearlimit/lubricatorgearcharge/create/script");
    }

    public function updateLubricatorGearCharge($limitId, $groupId)
    {
        $data['limitId'] = $limitId;
        $data['groupId'] = $groupId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/lubricatorgearlimit/lubricatorgearcharge/update/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/lubricatorgearlimit/lubricatorgearcharge/update/script");
    }
    

}