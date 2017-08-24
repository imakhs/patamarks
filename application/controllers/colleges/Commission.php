<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class Commission extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model(array('examples/validation_callables','college_model'));
    }
    public function register()
    {
        $lecs_options= $this->get_form_dropdown();
        $data['title'] = "Register New College";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/menu');
        $viewdata['col_data']=NULL;
        $viewdata['lecs_options']=$lecs_options;
        if ($this->form_validation->run('commission') == FALSE) :                
            $this->load->view('college', $viewdata);
        else :
            if($this->submit()):
                $this->load->view('success');
            else :
                echo "Error on db insert";
            endif;
        endif; 
        $this->load->view('includes/footer');
    }
    public function edit()
    {
        $data['title'] = "Edit Commissioned College";
        $editing = $this->uri->segment(4, 0);
        $this->load->view('includes/header', $data);
        $this->load->view('includes/menu');
        $college = new college_model();
        $college->col_id=$editing;
        $viewdata['col_data'] = $college->get();
        //var_dump($viewdata['col_data']);
        $viewdata['lecs_options'] = $this->get_form_dropdown();
        if ($this->form_validation->run('commission') == FALSE) :                
            $this->load->view('college', $viewdata);
        else :
            if($this->submit(TRUE)):
                $this->load->view('success');
            else :
                echo "Error on db insert";
            endif;
        endif; 
        $this->load->view('includes/footer');
    }
    public function submit($editstatus=FALSE)
    {
        $this->load->model('college_model');
        $college = new college_model();
        $college->col_id = $this->uri->segment(4, 0);
        $college->col_name=$this->input->post('col_name');
        $college->dean=$this->input->post('dean');
        $college->abbr=$this->input->post('abbr');
        $college->save($editstatus);
        return TRUE;
    }
    private function get_form_dropdown()
    {
        $this->load->model('lecturer_model');
        $lecs = $this->lecturer_model->get();
        $lecs_options = array();
        foreach ($lecs as $key => $lec) {
            $lecs_options[$lec->tutor_id] = $lec->fname . " " . $lec->sname. " - " . $lec->staff_id;
        }
        return $lecs_options;
    }
}