<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if ($selection) :
	$selected = $selection[$this->uri->segment(4, 0)];
else :
	//improved less variables than other views
	$selected = new exam_type_model();
	$selected->exam_type=set_value('exam_type'); 
	$selected->unit_id=set_value('unit_id'); 
	$selected->max_marks=set_value('max_marks'); 
	$selected->date=set_value('date'); 
endif;
echo form_open('current_url()', array("class"=>"form-horizontal"));
?>
<div class="regform">
	<div class="center-block heading">
		<H2><b>Exam Types</b></H2>
	</div>	
	<div class="form-group">
		<?php echo form_error('name', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-5">
			<?= form_label('Exam Name', 'name', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_input(array("class"=>"form-control",'name'=> 'name', 'id'=>'name','value'=>set_value('name'), 'placeholder'=>'Name'));
			?>
		</div>
	</div>
	<div class="form-group">
		<?= form_error('description', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
		<div class="col-sm-5">
			<?= form_label('Description', 'description', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_input(array("class"=>"form-control",'name'=> 'description', 'id'=>'description','value'=>set_value('description'), 'placeholder'=>'Enter Description'));
			?>
		</div>
	</div>
	<div class="form-group">
		<?= form_error('max_marks', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-5">
			<?= form_label('Max. Marks', 'max_marks', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_input(array("class"=>"form-control",'name'=> 'max_marks', 'id'=>'max_marks','value'=>set_value('max_marks'), 'placeholder'=>'Maximum Marks Awarded'));
			?>
		</div>
	</div>
<?php
	echo form_submit('register', 'Register', array('class'=>"btn btn-primary btn-block"));
?>
</div>
<?= form_close(); ?>
