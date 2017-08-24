<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class User extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
	    $this->load->helper('security');
  	}
  	public function index_get()
    {
    	$this->response(array("users" => [
        array(
         "username"=>"faiz",
         "name"=>"Faiz Khan",
         "course"=>"BCA",
         "session"=>"2014-2017"
        ),
        array(
         "username"=>"belal",
         "name"=>"Belal Khan",
         "course"=>"MCA",
         "session"=>"2015-2018"
        ),
        array(
         "username"=>"ramiz",
         "name"=>"Ramiz Khan",
         "course"=>"MBA",
         "session"=>"2015-2017"
        ),
        array(
         "username"=>"zafar",
         "name"=>"Zafar Khan",
         "course"=>"MBA",
         "session"=>"2014-2016"
        )]), REST_Controller::HTTP_OK);
    }
    
}