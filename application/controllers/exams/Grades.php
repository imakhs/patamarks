<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grades extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	    $this->load->helper('security');
	    $this->load->library('form_validation');
	    $this->load->model('course_model');
  	}
  	public function register()
  	{
  		$data['title'] = "Register Unit";
  		$viewdata['selection'] = NULL;
		$this->load->view('includes/header', $data);	
		$this->load->view('includes/menu');
		if ($this->form_validation->run('grade') == FALSE) :
			$this->load->view('grade',$viewdata);
		else :
			$this->load->model('unit_model');
			$unit = new grade_model();
			$unit->unit_code=$this->input->post('grade');
			$unit->unit_name=$this->input->post('min_score');
			$unit->save();
			$this->load->view('success');
		endif;
		$this->load->view('includes/footer');
	}
  	private function get_dropdown_data()
	{
		$this->load->model('grading_model');
		$colles = $this->grading_model->get();
		$colle_options = array();
		foreach ($colles as $key => $colle) {
		  $colle_options[$key] = $colle->col_name;
		}
		return $colle_options;
	}
}