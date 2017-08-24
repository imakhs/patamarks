<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class College extends REST_Controller
{
	public function __construct()
    {
        parent::__construct();
        // Configuring limits on our controller methods
        // Created the 'limits' table and 'limits' enabled within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
    public function index_get()
    {
    	
    }
}