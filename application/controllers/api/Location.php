<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }




}