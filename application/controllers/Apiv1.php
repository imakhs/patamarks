<?php
//require_once APPPATH . 'third_party/rest_server/application/controllers/REST_Controller.php';
require APPPATH.'/libraries/REST_Controller.php';
class Api extends REST_Controller{
	public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->load->library('REST_Controller');

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
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
    public function submit_mark_post()
    {
    	$this->load->model('api_model');
        
    	if ( $this->api_model->marksubmit() ){
            $message = "Success";
            $this->response(array(
                'application' => 'Patamarks',
                'message' => $message), REST_Controller::HTTP_OK);
        } else {
            $this->response([NULL, REST_Controller::HTTP_BAD_REQUEST]);
        }	
    }
    public function student_get()
    {
        $emp_no = $this->input->post('emp_no',TRUE);
        $grp_name = $this->input->post('grp_name',TRUE);
    	$this->response(

        NULL, REST_Controller::HTTP_OK);// OK (200) being the HTTP response code
    }
    public function assignment_get($emp_no)
    {
        $this->response(
                 array(
                    "assignments" => $this->db->get_where('assignment',array('lec_id'=>$emp_no))->result() ),REST_Controller::HTTP_OK);
    }
    public function get_auth_post()
    {
        $this->load->model('api_model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $query = $this->db->query("SELECT * FROM users WHERE username = '{$username}'");
        $userdetails = $query->row();
        
        $x_key = $this->generate_key();
        if ($password == $userdetails->password){
            $data = array(
                'key' => $x_key,
                'level' => $userdetails->is_admin,
                'ignore_limits' => 0,
                'date_created' => ""
            );
            if($this->db->insert("keys", $data))
            {
                $this->response(array('username'=>$userdetails->username,
                    'key'=>$x_key),REST_Controller::HTTP_OK);
            }
        }
    }
    public function generate_key($length = 45) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
}