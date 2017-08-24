<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Types extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->model('exam_type_model');
    }
    public function register()
    {
        $data['title'] = "Exam Types";
        $this->load->view('includes/header', $data);    
        $this->load->view('includes/menu');

        if ($this->form_validation->run('result') == FALSE)
        {                
            $viewdata['selection'] = NULL;
            $this->load->view('type',$viewdata);
        } else {
            $this->submit();
            $this->load->view('success');
        }
            $this->load->view('includes/footer');
    }
    public function edit($id)
    {
        $data['title'] = "Exam Types";
        $this->load->view('includes/header', $data);    
        $this->load->view('includes/menu');

        if ($this->form_validation->run('result') == FALSE)
        {                
            $type = new exam_type_model();
            $viewdata['selection'] = $type->get($id);
            $this->load->view('type',$viewdata);
        } else {
            $this->submit(TRUE, $id);
            $this->load->view('success');
        }
            $this->load->view('includes/footer');
    }
    public function submit($status=FALSE, $id=NULL)
    {
        $unit = new exam_type_model();
        $type->exam_type_id = $id;
        $unit->name=$this->input->post('name');
        $unit->description=$this->input->post('description');
        $unit->max_marks=$this->input->post('max_marks');
        $unit->save($status);
        return TRUE;
    }
}