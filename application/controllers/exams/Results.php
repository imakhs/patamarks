<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Results extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	    $this->load->helper('security');
	    $this->load->library('form_validation');
	    $this->load->model('exam_result_model');
  	}
  	public function register()
  	{
  		$data['title'] = "Register Unit";
		$this->load->view('includes/header', $data);	
		$this->load->view('includes/menu');
		$viewdata['selection'] = NULL;
		if ($this->form_validation->run('result') == FALSE)
		{                
			$this->load->view('result',$viewdata);
		} else {
			$this->submit();
			$this->load->view('success');
		}
			$this->load->view('includes/footer');
	}
	public function edit($id)
  	{
  		$data['title'] = "Register Unit";
		$this->load->view('includes/header', $data);	
		$this->load->view('includes/menu');

		if ($this->form_validation->run('result') == FALSE)
		{                
			$result = new exam_result_model();
			$viewdata[selection] = $result->get($id);
			$viewdata['selection'] = NULL;
			$this->load->view('result',$viewdata);
		} else {
			$this->submit(TRUE,$id);
			$this->load->view('success');
		}
			$this->load->view('includes/footer');
  	}
  	public function submit($status=FALSE, $id=NULL)
  	{
  		$unit = new exam_result_model();
		$unit->result_id=$id;
		$unit->examination_id=$this->input->post('examination_id');
		$unit->stud_id=$this->input->post('stud_id');
		$unit->marks=$this->input->post('marks');
		$unit->save($status);
  	}
}