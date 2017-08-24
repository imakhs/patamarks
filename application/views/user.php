<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$attributes = array("class"=>"form-horizontal");
	echo form_open('current_url()',$attributes);
?>
<div class="regform">
	<div class="center-block"><H2><b>REGISTER NEW ADMIN</b></H2></div>	
	<div class="form-group">
	<?php echo form_error('username', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<?php 
			$attr1 = array('class'=>"control-label col-sm-3");
			echo form_label('Username', 'username', $attr1);
		?>
		<div class="col-sm-9">
			<?php
				$attr2 = array("class"=>"form-control",'name'=> 'username', 'id'=>'username', 'placeholder'=>'User Name', 'value'=>set_value('username'), 'onclick'=>'');
				echo form_input($attr2);
			?>
		</div>
	</div>
	<div class="form-group">
	<?php echo form_error('email', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<?php 
			$attr3 = array('class'=>"control-label col-sm-3");
			echo form_label('Email address', 'email', $attr3);
		?>
		<div class="col-sm-9">
			<?php
				$attr4 = array("class"=>"form-control",'name'=> 'email', 'id'=>'email','value'=>set_value('email'), 'placeholder'=>'Email address');
				echo form_input($attr4);
			?>
		</div>
	</div>
	<div class="form-group">
	<?php echo form_error('password', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<?php 
			$attr5 = array('class'=>"control-label col-sm-3");
			echo form_label('Password', 'password', $attr5);
		?>
		<div class="col-sm-9">
			<?php
				$attr6 = array("class"=>"form-control",'name'=> 'password', 'id'=>'password','value'=>set_value('password'), 'placeholder'=>'Password');
				echo form_input($attr6);
			?>
		</div>
	</div>
	<div class="form-group">
	<?php echo form_error('confirm_password', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');?>
		<?php 
			$attr5 = array('class'=>"control-label col-sm-3");
			echo form_label('confirm Password', 'confirm_password', $attr5);
		?>
		<div class="col-sm-9">
			<?php
				$attr6 = array("class"=>"form-control",'name'=> 'confirm_password', 'id'=>'confirm_password','value'=>set_value('confirm_password'), 'placeholder'=>'Confirm Password');
				echo form_input($attr6);
			?>
		</div>
	</div>
	
<?php
	echo form_submit('register', 'Register User', array('class'=>"btn btn-primary btn-block"));
	?>
	</div>
	<?php
	echo form_close();
?>
