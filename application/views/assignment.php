<?php
/*Assignment view*/
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($selection)) :
	$selected = $selection[$this->uri->segment(4, 0)];
else :
	//improved less variables than other controllers
	$selected = new assignment_model();
	$selected->period=set_value('period'); 
	$selected->unit_id=set_value('unit_id'); 
	$selected->group_id=set_value('group_id'); 
	$selected->tutor_id=set_value('tutor_id'); 
endif;
if(isset($assignment)): 
	var_dump($assignment);
	$lec = $assignment[$this->uri->segment(4, 0)]->tutor_id; 
else: 
	$lec=''; 
endif;
	$attributes = array("class"=>"form-horizontal");
	echo form_open(current_url(), $attributes);
	
?>
<div class="regform">
	<div class="col-sm-12"><H2><b>Assign Tutors To Groups</b></H2></div>
	<div class="form-group row">
		<?= form_error('lec_id','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');?>
		<?= form_label('Lecturer', 'lec_id', array('class'=>"col-sm-3 control-label"));?>
		<div class="col-sm-9">
			<?php
			if(is_null($lecs_options)):$lecs_options = []; endif;
				echo form_dropdown(
					'lec_id', 
					$lecs_options,
					$lec, 
					array("class"=>"form-control", 
						'id'=>'lec_id',
						'value'=>set_value('lec_id')));
			?>	
		</div>
	</div>
	<div class="form-group">
		<?= form_error('group_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); echo validation_errors(); ?>
		<?= form_label('Select Group', 'group_id', array('class'=>"col-sm-3 control-label"));?>
		<div class="col-sm-9">
			<?= form_dropdown(
				'group_id', 
				$group_options,
				"", 
				array("class"=>"form-control", 'id'=>'group_id','value'=>set_select('group_id'), 'placeholder'=>'Group ID'));
			?>
		</div>
	</div>

	<div class="form-group">
		<?= form_error('unit_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<?= form_label('Unit', 'unit_id', array('class'=>"control-label col-sm-3"));
		?>
		<div class="col-sm-9">
			<?= form_dropdown(
					'unit_id', 
					$unit_options,
					"", 
					array("class"=>"form-control", 'id'=>'unit_id','value'=>set_value('unit_id'), 'placeholder'=>'Unit'));
			?>
		</div>
	</div>
	
	<div class="form-group">
		<?= form_error('period', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<?= form_label('Semester Start', 'period', array('class'=>"control-label col-sm-3 "));?>
		<div class="col-sm-9">
			<?= form_input(
					array("class"=>"form-control",
							'name'=> 'period', 
							'id'=>'period',
							'value'=>set_value('period'), 
							'placeholder'=>'YYYY'));
			?>
		</div>
	</div>

	<?= form_submit('assign', 'Assign', array('class'=>"btn btn-success btn-block "));?>
</div>

	<?= form_close();?>

