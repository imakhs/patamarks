<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$attributes = array("class"=>"form-horizontal");
	echo form_open(current_url(),$attributes, '');
	if($form_data):
		$edit_item = $this->uri->segment(4, 0);
		$code_item = $form_data[$edit_item]->unit_code;
		$name_item = $form_data[$edit_item]->unit_name;
		$abbr_item = $form_data[$edit_item]->abbr;
	else :
		$code_item = set_value('unit_code');
		$name_item = set_value('unit_name');
		$abbr_item = set_value('abbr');
	endif;

?>
<div class="regform">
	<div class="center-block"><H2><b><p class="heading">REGISTER A NEW COURSE UNIT</p></b></H2></div>	
		<div class="form-group">
			<?php 
			echo form_error('unit_code', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
			?>
			<div class="col-sm-5">
				<?php 
				echo form_label('Unit Code', 'unit_code', array('class'=>"control-label"));
				?>
			</div>
			<div class="col-sm-7">
				<?php
				echo form_input(array("class"=>"form-control",'name'=> 'unit_code', 'id'=>'unit_code','value'=>$code_item, 'placeholder'=>'Unit Code'));
				?>
			</div>
		</div>
		<div class="form-group">
			<?php 
			echo form_error('unit_name', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
			?>
			<div class="col-sm-5">
				<?php 
				echo form_label('Unit name', 'unit_name', array('class'=>"control-label"));
				?>
			</div>
			<div class="col-sm-7">
				<?php
				echo form_input(array("class"=>"form-control",'name'=> 'unit_name', 'id'=>'unit_name','value'=>$name_item, 'placeholder'=>'Unit name'));
				?>
			</div>
		</div>
		<div class="form-group">
			<?php 
			echo form_error('abbr', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
			?>
			<div class="col-sm-5">
				<?php 
				echo form_label('Unit Abbreviation', 'abbr', array('class'=>"control-label"));
				?>
			</div>
			<div class="col-sm-7">
				<?php
				echo form_input(array("class"=>"form-control",'name'=> 'abbr', 'id'=>'abbr','value'=>$abbr_item, 'placeholder'=>'Unit Abbreviation'));
				?>
			</div>
		</div>
	<?php
	echo form_submit('register', 'Register Unit', array('class'=>"btn btn-primary btn-block"));
	echo form_close();
	?>
</div>