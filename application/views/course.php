<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$sem_no = array(3=>3, 6=>6, 9=>9, 12=>12, 15=>15);
$unit_no = array(20=>20, 40=>40, 50=>50);
if ($selection) :
	$selected = $selection[$this->uri->segment(4, 0)];
else :
	//improved less variables than other controllers
	$selected = new course_model();
	$selected->college_offered_id=set_value('col_id'); 
	$selected->total_units=set_value('units'); 
	$selected->semesters=set_value('semesters'); 
	$selected->name=set_value('name'); 
	$selected->abbreviation=set_value('abbr');
endif;
echo form_open(current_url(), array("class"=>"form-horizontal"));
?>
<div class="regform">
	<H2><b><p class="heading">REGISTER NEW COURSE</p></b></H2>
	<h4>DEGREE/DIPLOMA/CERTIFICATE</h4>	
	<div class="form-group">
		<?= form_error('cou_name', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-4">
			<?= form_label('Name', 'name', array('class'=>"control-label"));?>
		</div>
		<div class="col-sm-8">
			<?= form_input(
				array("class"=>"form-control",
					'name'=> 'name', 
					'id'=>'name',
					'value'=>$selected->name, 
					'placeholder'=>'Course Name'));
			?>
		</div>
	</div>
	<div class="form-group">
		<?= form_error('cou_abbr', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-4">
			<?= form_label('Abbreviation', 'abbr', array('class'=>"control-label"));?>
		</div>
		<div class="col-sm-8">
			<?= form_input(
				array("class"=>"form-control",
					'name'=> 'abbr', 
					'id'=>'abbr',
					'value'=>$selected->abbreviation, 
					'placeholder'=>'Course Abbreviation'));
			?>
		</div>
	</div>
	<div class="form-group">
		<?= form_error('semesters', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-4">
			<?= form_label('Semesters', 'semesters', array('class'=>"control-label"));?>
		</div>
		<div class="col-sm-8">
			<?= form_dropdown(
					'semesters', 
					$sem_no,
					$selected->semesters, 
					array("class"=>"form-control", 
						'id'=>'semesters'));
			?>
		</div>
	</div>

	<div class="form-group">
		<?= form_error('units', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-4">
			<?= form_label('No of Units', 'units', array('class'=>"control-label"));?>
		</div>
		<div class="col-sm-8">
			<?= form_dropdown(
					'units', 
					$unit_no,
					$selected->total_units, 
					array("class"=>"form-control", 
						'id'=>'units',
						'value'=>$selected->total_units, 
						'placeholder'=>'College offering course'));
			?>
		</div>
	</div>

	<div class="form-group">
		<?= form_error('col_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-4">
			<?= form_label('College', 'col_id', array('class'=>"control-label"));?>
		</div>
		<div class="col-sm-8">
			<?= form_dropdown(
					'col_id', 
					$colle_options,
					$selected->college_offered_id, 
					array("class"=>"form-control", 
						'id'=>'col_id',
						'value'=>$selected->college_offered_id, 
						'placeholder'=>'College offering course'));
			?>
		</div>
	</div>
	<?=form_submit('register', 'Save Course', array('class'=>"btn btn-primary btn-block",));?>
</div>
<?= form_close();?>
