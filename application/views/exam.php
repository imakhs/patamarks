<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if ($selection) :
	$selected = $selection[$this->uri->segment(4, 0)];
else :
	//improved less variables than other views
	$selected = new examination_model();
	$selected->exam_type=set_value('exam_type'); 
	$selected->unit_id=set_value('unit_id'); 
	$selected->max_marks=set_value('max_marks'); 
	$selected->date=set_value('date'); 
endif;
echo form_open(current_url(), array("class"=>"form-horizontal"));
?>
<div class="regform">
	<div class="center-block heading">
		<H2><b>Schedule An Exam</b></H2>
	</div>	
	<div class="form-group">
	<?php echo form_error('exam_type', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-5">
			<?= form_label('Exam Type', 'exam_type', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_input(array("class"=>"form-control",'name'=> 'exam_type', 'id'=>'exam_type','value'=>set_value('exam_type'), 'placeholder'=>'Exam Type'));
			?>
		</div>
	</div>
	<div class="form-group">
	<?= form_error('unit_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
		<div class="col-sm-5">
			<?= form_label('Course Unit', 'unit_id', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_input(array("class"=>"form-control",'name'=> 'unit_id', 'id'=>'unit_id','value'=>set_value('unit_id'), 'placeholder'=>'Unit Code'));
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
	<div class="form-group">
	<?= form_error('date', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-5">
			<?= form_label('Date', 'date', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_input(array("class"=>"form-control",'name'=> 'date', 'id'=>'date','value'=>set_value('date'), 'placeholder'=>'YYYY-MM-DD'));
			?>
		</div>
	</div>

<?php
	echo form_submit('register', 'Register', array('class'=>"btn btn-primary btn-block"));
?>
</div>
<?= form_close(); ?>
