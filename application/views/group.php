<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$attributes = array("class"=>"form-horizontal");
	echo form_open('current_url()', $attributes);
?>
<div class="regform">
	<div class="center-block"><H2><b>Register New Group</b></H2></div>	
	<div class="form-group">
	<?php echo form_error('grp_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
	<?php 
		$attr1 = array('class'=>"control-label col-sm-3");
		echo form_label('Group Name', 'grp_id', $attr1);
	?>
		<div class="col-sm-9">
			<?php
				$attr2 = array("class"=>"form-control",'id'=>'grp_id', 'name'=>'grp_id', 'value'=>set_value('grp_id'), 'placeholder'=>'Group Name');
				echo form_input($attr2);
			?>
		</div>
	</div>
	<div class="form-group">
	<?php echo form_error('course_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
	<?php 
		$attr3 = array('class'=>"control-label col-sm-3");
		echo form_label('Course Undertaken', 'course_id', $attr3);
	?>
		<div class="col-sm-9">
			<?php
				$attr4 = array("class"=>"form-control",'name'=> 'course_id', 'id'=>'course_id','value'=>set_value('course_id'), 'placeholder'=>'Course Name');
				//echo form_input($attr4);
				echo form_dropdown('course_id', $course_options,"", $attr4);
			?>
		</div>
	</div>
	<div class="form-group">
	<?php echo form_error('intake', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
	<?php 
		$attr5 = array('class'=>"control-label col-sm-3");
		echo form_label('Intake Date', 'intake', $attr5);
	?>
		<div class="col-sm-9">
			<?php
				$attr6 = array("class"=>"form-control",'name'=>'intake', 'id'=>'intake', 'value'=>set_value('intake'), 'placeholder'=>'Intake Date');
				echo form_input($attr6);
			?>
		</div>
	</div>
<?php
	echo form_submit('register', 'Register', array('class'=>"btn btn-primary btn-block"));
	echo form_close();
?>
</div>
