<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Schedule extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	    $this->load->helper('security');
	    $this->load->library('form_validation');
	    $this->load->model('examination_model');
  	}
  	public function register()
  	{
  		$data['title'] = "New Exam";
		$this->load->view('includes/header', $data);	
		$this->load->view('includes/menu');
		$viewdata['selection'] = NULL;
		if ($this->form_validation->run('exam') == FALSE)
		{                
			$this->load->view('exam',$viewdata);
		} else {
			$this->submit();
			$this->load->view('success');
		}
			$this->load->view('includes/footer');
	}
	public function edit($id)
  	{
  		$data['title'] = "Edit Exam";
		$this->load->view('includes/header', $data);	
		$this->load->view('includes/menu');
		$exam = new examination_model();
		$viewdata['selection'] = $exam->get($id);
		if ($this->form_validation->run('exam') == FALSE)
		{                
			$this->load->view('exam', $viewdata);
		} else {
			$this->submit(TRUE,$id);
			$this->load->view('success');
		}
			$this->load->view('includes/footer');
  	}
  	public function submit($id=FALSE,$status=FALSE)
  	{
  		$unit = new examination_model();
		$unit->exam_id=$id;
		$unit->exam_type=$this->input->post('exam_type');
		$unit->unit_id=$this->input->post('unit_id');
		$unit->max_marks=$this->input->post('max_marks');
		$unit->date=$this->input->post('date');
		$unit->save($status);
  	}
}