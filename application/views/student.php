<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$attributes = array("class"=>"form-horizontal");
	echo form_open(current_url(),$attributes);
?>
<div class="regform">
	<div class="center-block"><H2><b>REGISTER NEW STUDENT</b></H2></div>	
	
	<br />

	<div class="form-group row">
		<?php
		echo form_error('fname', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('First Name', 'fname', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control ",'name'=> 'fname', 'id'=>'fname', 'placeholder'=>'First Name', 'value'=>set_value('fname')));
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('sname', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Sir Name', 'sname', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'sname', 'id'=>'sname', 'placeholder'=>'Sir Name', 'value'=>set_value('sname')));
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('identification', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Identification No', 'identification', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'identification', 'id'=>'identification', 'placeholder'=>'Passport/National ID Number', 'value'=>set_value('identification')));
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('group_id', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Group No', 'group_id', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'group_id', 'id'=>'group_id', 'placeholder'=>'Tutoring Group', 'value'=>set_value('group_id')));
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('email', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Email Address', 'email', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'email', 'id'=>'email', 'placeholder'=>'Email Address', 'value'=>set_value('email')));
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('nationality', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Nationality', 'nationality', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'nationality', 'id'=>'nationality', 'placeholder'=>'Nationality', 'value'=>set_value('nationality')));
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('dob', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Date Of Birth', 'dob', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'dob', 'id'=>'dob', 'placeholder'=>'DD-MM-YYYY', 'value'=>set_value('dob')));
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('gender', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Gender', 'gender', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			$options = array(
		        'Male'         => 'Male',
		        'Female'           => 'Female');
			$extra = array(
				'id'=>'gender',
				'value'=>set_value('gender'),
				'class'=>'form-control');
			echo form_dropdown('gender', $options, 'Female', $extra);
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('marital', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Marital Status', 'marital', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			
			$options = array(
		        'Single'         => 'Single',
		        'Separated'           => 'Separated',
		        'Married'         => 'Married');
			$extra = array(
				'id'=>'marital',
				'value'=>set_value('marital'),
				'class'=>'form-control');
			echo form_dropdown('marital', $options, 'Single', $extra);
			
			?>
		</div>
	</div>

	<div class="form-group row">
		
		<?php 
		echo form_error('salutation', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Salutation', 'salutation', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			$options = array(
		        'Mr'         => 'Mister',
		        'Miss'           => 'Miss',
		        'Mrs'         => 'Mrs',
		        'Dr'        => 'Doctor');
			$extra = array(
				'id'=>'salutation',
				'value'=>set_value('salutation'),
				'class'=>'form-control');
			echo form_dropdown('salutation', $options, 'Mr', $extra);
			
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('status', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Status', 'status', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			$options = array(
		        'Active'         => 'Active',
		        'Inactive'           => 'Inactive');
			$extra = array(
				'id'=>'status',
				'value'=>set_value('status'),
				'class'=>'form-control');
			echo form_dropdown('status', $options, 'Inactive', $extra);
			
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php 
		echo form_error('status_deets', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Status Details', 'status_deets', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'status_deets', 'id'=>'status_deets', 'placeholder'=>'Status Details', 'value'=>set_value('status_deets')));
			?>
		</div>
	</div>

	<div class="form-group row">
		
		<?php 
		echo form_error('passwd', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Password', 'passwd', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'passwd', 'id'=>'passwd', 'placeholder'=>'password', 'value'=>set_value('passwd')));
			?>
		</div>
	</div>

	<div class="form-group row">
		
		<?php 
		echo form_error('prim_fname', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('First Name', 'prim_fname', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'prim_fname', 'id'=>'prim_fname', 'placeholder'=>'Primary Guardian First Name', 'value'=>set_value('prim_fname')));
			?>
		</div>
	</div>

	<div class="form-group row">
		
		<?php 
		echo form_error('prim_sname', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Second Name', 'prim_sname', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'prim_sname', 'id'=>'prim_sname', 'placeholder'=>'Primary Guardian Second Name', 'value'=>set_value('prim_sname')));
			?>
		</div>
	</div>

	<div class="form-group row">
		
		<?php 
		echo form_error('prim_email', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Email', 'prim_email', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'prim_email', 'id'=>'prim_email', 'placeholder'=>'Primary Guardian Email', 'value'=>set_value('prim_email')));
			?>
		</div>
	</div>

	<div class="form-group row">
		
		<?php 
		echo form_error('prim_phone', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Telephone', 'prim_phone', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'prim_phone', 'id'=>'prim_phone', 'placeholder'=>'Primary Guardian Telephone', 'value'=>set_value('prim_phone')));
			?>
		</div>
	</div>

	<div class="form-group row">
		
		<?php 
		echo form_error('prim_relation', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		?>
		<div class="col-md-5">
			<?php
			echo form_label('Relationship', 'prim_relation', array('class'=>"control-label"));
			?>
		</div>
		<div class="col-md-7">
			<?php
			echo form_input(array("class"=>"form-control",'name'=> 'prim_relation', 'id'=>'prim_relation', 'placeholder'=>'Relationship', 'value'=>set_value('prim_relation')));
			?>
		</div>
	</div>


<?php
	echo form_submit('register', 'Register', array('class'=>"btn btn-primary btn-block"));
	echo form_close();
?>
</div>