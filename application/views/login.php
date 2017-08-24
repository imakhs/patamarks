<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PataMarks - Login View
 *
 * PataMarks is a marks submission application using CodeIgniter 3
 *
 * @package     PataMarks
 * @author      Makhanu Sinja
 * @copyright   Copyright (c) 2016 - 2017 Makhanu Sinja(http://imakhs.com)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://github.com/makhsinja/patamarks
 */

if( ! isset( $on_hold_message ) )
{
	if( isset( $login_error_mesg ) )
	{
		echo '
			<div style="border:1px solid red;">
				<p>
					Login Error #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.
				</p>
				<p>
					Username, email address and password are all case sensitive.
				</p>
			</div>
		';
	}

	if( $this->input->get('logout') )
	{
		echo '
			<div style="border:1px solid green">
				<p>
					You have successfully logged out.
				</p>
			</div>
		';
	}
	?>
	<div class="row main-login main-center">
		<div class="col-md-6 logo">

			<img src="<?php echo base_url(); ?>resource/images/jkuat-logo.png" />

		</div>
		<div class="col-md-6 panel panel-primary">
			<div class='main-login main-center'>
				<?php
					echo form_open($login_url, array("class"=>"form-horizontal") );
				?>
				<div class = "panel-heading">
				<H3 style="padding: auto; margin: auto; text-align: center; color: #4CAF50"><b>ADMIN LOGIN</b></H3>
				</div>
				<br>
				<div class="panel-body">
				<div class="form-group <?php if(set_value('login_string')): echo "has-error"; endif; ?>">
					<?php 
						echo form_label('Username', 'login_string', array('class'=>"control-label"));
					?>
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
							<?php echo form_input('login_string', '', array("class"=>"form-control", 'id'=>'login_string', 'value'=>set_value('login_string'), 'autocomplete'=>"off", 'maxlength'=>"255"));
							?>
						</div>
					</div>
				</div>

				<?php 
					echo form_error('username', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
				?>
				<div class="form-group <?php if(set_value('login_pass')){echo "has-error";}?>">
			    	<label for="login_pass" class="control-label">Password</label>
			    	<div class="col-sm-12">
			    		<div class="input-group">
				    		<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i>
				    		</span>
							<?php	
					      		$attr2=array('class'=>"form-control",'id'=>"login_pass", 'value'=>set_value('login_pass'));
					      		echo form_password('login_pass', '', $attr2); 
					      	?>
				      	</div>
			    	</div>
			  	</div>
			  	<?php
					echo form_error('password', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
				?>
				</div>
				<?php
					echo form_submit('login', 'Login', array('class'=>"btn btn-custom btn-block"));
					echo form_close();
				?>
			</div>
		</div>			
	</div>


<?php
	}
	else
	{
		// EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
		echo '
			<div style="border:1px solid red;">
				<p>
					Excessive Login Attempts
				</p>
				<p>
					You have exceeded the maximum number of failed login<br />
					attempts that this website will allow.
				<p>
				<p>
					Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
				</p>
				<p>
					Please use the <a href="/examples/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
					or contact us if you require assistance gaining access to your account.
				</p>
			</div>
		';
	}

/* End of file login.php */