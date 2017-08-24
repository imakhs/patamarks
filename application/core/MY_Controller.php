<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - MY Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2016, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

require_once APPPATH . 'third_party/community_auth/core/Auth_Controller.php';

class MY_Controller extends Auth_Controller
{
	/**
	 * Class constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}
	public function create_user_account(){
		$this->load->model('user_model');
    $user = new user_model();
    $user->user_id    = (integer)$user->get_unused_id();
    $user->username   = (string)$this->input->post('username');
    $user->passwd     = (string)$this->authentication->hash_passwd($this->input->post('passwd'));
    $user->email      = (string)$this->input->post('email');
    $user->auth_level = (integer)$this->input->post('auth_level'); // 9 if you want to login @ examples/index.
    $user->created_at = date('Y-m-d H:i:s');

    //check if account exists. Will return true if account exists, false if not
    $this->is_logged_in();
    if( $user->insert() == 1 )
    	return TRUE;
	}
}

/* End of file MY_Controller.php */
/* Location: /community_auth/core/MY_Controller.php */