
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Courses extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('security','date'));
      		$this->load->library('form_validation');
      		$this->load->model(array('examples/validation_callables','course_model'));
		}
		public function register()
		{
			$viewdata['colle_options'] = $this->get_dropdown_data();
			$viewdata['selection'] = NULL;
			$data['title'] = "Register New Course";
			$this->load->view('includes/header', $data);
			$this->load->view('includes/menu');
			if ($this->form_validation->run('course') == FALSE)
			{                
				$this->load->view('course', $viewdata);
			} else {
		         if($this->submit()):
		        	$this->load->view('success');
		        else : echo "db issues";
		    endif;
			} 
		  	$this->load->view('includes/footer');
	  	}
		public function edit()
		{
			$viewdata['colle_options'] = $this->get_dropdown_data();
			$data['title'] = "Edit Course";
			$selection = new course_model();
			$viewdata['selection'] = $selection->get($this->uri->segment(4, 0));
			$this->load->view('includes/header', $data);
			$this->load->view('includes/menu');
			if ($this->form_validation->run('course') == FALSE) :
				$this->load->view('course', $viewdata);
			else :
		        if($this->submit(TRUE)):
		        	$this->load->view('success');
		        else : echo "db issues";
		        endif;
			endif;
		  	$this->load->view('includes/footer');
	  	}
		private function submit($status=FALSE)
		{
			$course = new course_model();
			$course->idcourse=(string)$this->uri->segment(4, 0);
			$course->name=(string)$this->input->post('name');
			$course->abbreviation=(string)$this->input->post('abbr');
			$course->semesters=(string)$this->input->post('semesters');
			$course->total_units=(string)$this->input->post('units');
			$course->college_offered_id=(int)$this->input->post('col_id');
			$course->save($status);
			return TRUE;
		}
		private function get_dropdown_data()
		{
			$this->load->model('college_model');
			$colles = $this->college_model->get();
			$colle_options = array();
			foreach ($colles as $key => $colle) {
			  $colle_options[$key] = $colle->col_name;
			}
			return $colle_options;
		}
		private function set_constants()
		{
			$detail['units'] = array();
		}
}