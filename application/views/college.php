<?php defined('BASEPATH') OR exit('No direct script access allowed');
	if($col_data):
		$col_name = $col_data[$this->uri->segment(4, 0)]->col_name;
		$abbr = $col_data[$this->uri->segment(4, 0)]->abbr;
		$dean=$col_data[$this->uri->segment(4, 0)]->dean;
		else:
			$col_name = set_value('col_name');
			$abbr = set_value('abbr');
			$dean = set_value('dean');;
	endif;
	$attributes = array("class"=>"form-horizontal");
	echo form_open(current_url(), $attributes);
	//var_dump($col_name);
	?>
<div class="regform">
<H2><b><p class="heading">COMMISSION A NEW COLLEGE</p></b></H2>	
	<div class="form-group">
		<?= form_error('col_name', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-5">
			<?= form_label(
					'Name', 
					'col_name', 
					array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_input(
					array("class"=>"form-control",
						'name'=> 'col_name', 
						'id'=>'col_name',
						'value'=>$col_name, 
						'placeholder'=>'College Name'));
			?>
		</div>
	</div>
	<div class="form-group">
		<?= form_error('abbr', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-5">
			<?= form_label(
					'Abbreviation', 
					'abbr', 
					array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_input(
					array("class"=>"form-control",
						'name'=> 'abbr', 
						'id'=>'abbr',
						'value'=>$abbr, 
						'placeholder'=>'College Abbr'));
			?>
		</div>
	</div>

	<div class="form-group">
		<?= form_error('dean', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<div class="col-sm-5">
			<?= form_label(
					'Chairperson', 
					'dean', 
					array('class'=>"control-label"));
			?>
		</div>
		<div class="col-sm-7">
			<?= form_dropdown(
					'dean', 
					$lecs_options,
					$dean, 
					array("class"=>"form-control", 
						'id'=>'dean',
						'value'=>$dean, 
						'placeholder'=>'Chairperson'));
			?>
		</div>
	</div>
	<?php
	echo form_submit('register', 'Commission College', array('class'=>"btn btn-primary btn-block"));?>
	</div>
	<?php echo form_close(); ?>
</div>