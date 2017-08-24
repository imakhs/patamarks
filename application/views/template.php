<?php $this->load->view('includes/header'); ?>

<?php if($userlevel == 1) { $this->load->view('includes/admin_menu');} else if ($userlevel == 2){ $this->load->view('includes/student_menu'); } ?>

<?php $this->load->view($main_content); ?>

<?php $this->load->view('includes/footer'); ?>
