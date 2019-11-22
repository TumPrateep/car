<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function caraccessory()
    {
        $data = [
            'tire' => '', 'lubricator' => '', 'garage' => '',
        ];

        load_user_view("users/register/caraccessory/content", "users/register/caraccessory/script", $data);

    }

    public function garage()
    {
        $data = [
            'tire' => '', 'lubricator' => '', 'garage' => '',
        ];

        load_user_view("users/register/garage/content", "users/register/garage/script", $data);

    }

}