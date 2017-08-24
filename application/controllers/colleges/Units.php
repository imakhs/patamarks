<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Units extends MY_Controller{
  	function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
  		$this->load->library('form_validation');
  		$this->load->model(array('examples/validation_callables','unit_model'));
	}
	public function register()
	{
		$data['title'] = "Register Unit";
		$viewdata['form_data'] = [];
		$this->load->view('includes/header', $data);	
		$this->load->view('includes/menu');
		if ($this->form_validation->run('unit') == FALSE)
		{                
			$this->load->view('unit',$viewdata);
		} else {
			if($this->submit()) :
				$message['notification'] = "Success";
				$this->load->view('unit', $message);
			endif;
			}
			$this->load->view('includes/footer');
	}
	public function edit($id)
	{
		$data['title'] = "Edit Unit";
		$unit = new unit_model();
		$viewdata['form_data'] = $unit->get($id);
		$this->load->view('includes/header', $data);	
		$this->load->view('includes/menu');
		if ($this->form_validation->run('unit') == FALSE)
		{                
			$this->load->view('unit',$viewdata);
		} else {
			if($this->submit(TRUE,$id)) :
				$this->load->view('success');
			else : echo "db update issue";
			endif;
		}
			$this->load->view('includes/footer');
	}
	private function submit($status=FALSE,$id=NULL)
	{
		$unit = new unit_model();
		$unit->unit_id=$id;
		$unit->unit_code=$this->input->post('unit_code');
		$unit->unit_name=$this->input->post('unit_name');
		$unit->abbr=$this->input->post('abbr');
		$unit->save($status);
		return TRUE;
	}
}