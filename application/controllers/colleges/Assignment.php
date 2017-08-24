<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Assignment Controller*/
//set selected array like in courses
class Assignment extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->model('assignment_model');
    }
    public function register()
    {
        $data['title'] = "Assign unit";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/menu');
        if ($this->form_validation->run('assignment') == FALSE)
        {                
            $viewdata = $this->get_dropdown_data();
            $viewdata['assignment']=NULL;
            $this->load->view('assignment', $viewdata);
        } else {
            $this->submit();
            $this->load->view('success');
        } 
        $this->load->view('includes/footer');
    }
    public function edit()
    {
        $data['title'] = "Assign unit";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/menu');
        if ($this->form_validation->run('assignment') == FALSE) :                
            $viewdata = $this->get_dropdown_data();
            $editing = $this->uri->segment(4, 0);
            $assignment = new assignment_model();
            $assignment->id = $editing;
            $result = $assignment->get();
            $viewdata = $this->get_dropdown_data();
            $viewdata['assignment']=$result;
            $this->load->view('assignment', $viewdata); 
        else :
            $this->submit(TRUE);
            $this->load->view('success');
        endif; 
        $this->load->view('includes/footer');
    }
    public function submit($editstatus=FALSE)
    {
        $assignment = new assignment_model();
        $assignment->tutor_id = $this->input->post('lec_id');
        $assignment->group_id = $this->input->post('group_id');
        $assignment->unit_id = $this->input->post('unit_id');
        $assignment->period = $this->input->post('period');
        $assignment->status = "1";
        $assignment->save($editstatus);
    }
    private function get_dropdown_data()
    {
        $viewdata=[];
        $this->load->model('lecturer_model');
        $lecs = $this->lecturer_model->get('','','tutors.staff_id');
        $lecs_options = [];
        foreach ($lecs as $key => $tutor) {
            $lecs_options[$tutor->tutor_id] = $tutor->fname . " " . $tutor->sname ."    -- ".$tutor->staff_id;
        }
        $viewdata['lecs_options'] = $lecs_options;
        //get data for available groups
        $this->load->model('group_model');
        $groups = $this->group_model->get_full_deets();
        $group_options = array();
        foreach ($groups as $key => $group) {
            $group_options[$group->group_id] = $group->group_name. " - " . $group->course_name;
        }
        $viewdata['group_options'] = $group_options;
        //var_dump($group_options);
        //get data for available units
        $this->load->model('unit_model');
        $units = $this->unit_model->get();
        $unit_options = array();
        foreach ($units as $key => $unit) {
            $unit_options[$key] = $unit->unit_name;
        }
        $viewdata['unit_options'] = $unit_options;
        return $viewdata;
    }
}