<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if ($selection) :
	$selected = $selection[$this->uri->segment(4, 0)];
else :
	//improved less variables than other controllers
	$selected = new course_model();
	$selected->grade=set_value('grade'); 
	$selected->min_score=set_value('min_score'); 
endif;
echo form_open(current_url(), array("class"=>"form-horizontal"));
?>
<div class="regform">
	<H2><b><p class="heading">Exam Grades</p></b></H2>
	<div class="form-group">
		<?php 
		echo form_error('grade', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-sm-4">
			<?php 
			echo form_label('grade', 'grade', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-8">
			<?php
			echo form_input(
				array("class"=>"form-control",
					'grade'=> 'grade', 
					'id'=>'grade',
					'value'=>$selected->grade, 
					'placeholder'=>'Course grade'));
			?>
		</div>
	</div>
	<div class="form-group">
		<?php 
		echo form_error('min_score', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-sm-4">
			<?php 
			echo form_label('Abbreviation', 'min_score', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-8">
			<?php
			echo form_input(
				array("class"=>"form-control",
					'name'=> 'min_score', 
					'id'=>'min_score',
					'value'=>$selected->min_score, 
					'placeholder'=>'Minimum Score'));
			?>
		</div>
	</div>
	
	<?php
	echo form_submit('register', 'Save Course', array('class'=>"btn btn-primary btn-block"));?>

</div>
<?php
	echo form_close();
?>