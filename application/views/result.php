<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if ($selection) :
	$selected = $selection[$this->uri->segment(4, 0)];
else :
	//improved less variables than other controllers
	$selected = new exam_result_model();
	$selected->examination_id=set_value('examination_id'); 
	$selected->stud_id=set_value('stud_id'); 
	$selected->marks=set_value('marks');  
endif;
echo form_open(current_url(), array("class"=>"form-horizontal"));
?>
<div class="regform">
	<H2><b><p class="heading">Submit Results</p></b></H2>
	<div class="form-group">
		<?php 
		echo form_error('examination_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-sm-4">
			<?php 
			echo form_label('Exam Code', 'examination_id', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-8">
			<?php
			echo form_input(
				array("class"=>"form-control",
					'name'=> 'examination_id', 
					'id'=>'examination_id',
					'value'=>$selected->examination_id, 
					'placeholder'=>'Exam Code'));
			?>
		</div>
	</div>
	<div class="form-group">
		<?php 
		echo form_error('stud_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-sm-4">
			<?php 
			echo form_label('Student No', 'stud_id', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-8">
			<?php
			echo form_input(
				array("class"=>"form-control",
					'name'=> 'stud_id', 
					'id'=>'stud_id',
					'value'=>$selected->stud_id, 
					'placeholder'=>'Student Admission No'));
			?>
		</div>
	</div>
	<div class="form-group">
		<?php 
		echo form_error('marks', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-sm-4">
			<?php 
			echo form_label('Marks Award', 'marks', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-8">
			<?php
			echo form_input(
				array("class"=>"form-control",
					'name'=> 'marks', 
					'id'=>'marks',
					'value'=>$selected->marks, 
					'placeholder'=>'Marks'));
			?>
		</div>
	</div>
	
	<?php
	echo form_submit('register', 'Save Course', array('class'=>"btn btn-primary btn-block"));?>

</div>
<?php
	echo form_close();
?>