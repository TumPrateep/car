<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

require_once APPPATH.'third_party/omise-php/vendor/autoload.php';

class Omise extends BD_Controller {
    function __construct()
    {
        parent::__construct();
    }


    
}