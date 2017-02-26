<?php

use \Helpers\Form;
use \Core\Error;

?>

<div class="loginContainer">
		


<div class="login_card__wrapper ">
	

<div class="card align_left">
	<div class="card_body align_left">
		<div class="row">
			<div class="site-logo">
			
			</div>
		</div>

		<?php if($error) { ?>
			<div class="row">
				<div class="col_12">
					<div class="message message_danger margin-v20">
						<?php echo Error::display($error); ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php echo Form::open(array('method' => 'post'));?>
			<div class="row">
				<div class="col_12">
					<label class="form_label form_label_top" for="username">Username</label>
				</div>
				<div class="col_12">
					<?php  echo Form::input(array('name' => 'username', 'class' => 'form_input')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col_12">
					<label class="form_label form_label_top" for="password">Password</label>
				</div>
				<div class="col_12">
					<?php  echo Form::input(array('type' => 'password', 'name' => 'password', 'class' => 'form_input')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col_12">
					<?php  echo Form::input(array('type' => 'submit', 'name' => 'submit', 'value' => 'Log In', 'class' => 'button button_site_color width-100')); ?>
				</div>
			</div>
		<?php echo Form::close(); ?>
	</div>
</div>

</div>
</div>