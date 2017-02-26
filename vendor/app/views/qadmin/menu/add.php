<?php

use \Helpers\Form;
use \Helpers\Session;

?>


<section class="application_view">
    <?php echo Form::open(array('id' => 'page','method' => 'post'));?>
        <div class="row">
            <div class="col_12 margin-top--20">
                <h1>Create Menu</h1>
            </div>
            <div class="col_4 margin-top--20">
                <label class="form_label is-required" for="menuName">Menu Name</label>
                <?php echo Form::input(array('name' => 'menuName', 'type' => 'text' ,'class' => 'form_input', 'required' => 'required')); ?>
            </div>
            <div class="col_12 col_12_md">
                 <?php echo Form::input(array('type' => 'submit', 'name' => 'submit', 'value' => 'Create', 'type' => 'submit',  'class' => 'button button_site_color')); ?>
            </div>
        </div>
    <?php echo Form::close(); ?>
</section>
