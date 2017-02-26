<?php

use \Helpers\Form;
use \Helpers\Session;
use \Core\Error;

?>

<section class="application_view">
    <?php echo Form::open(array('id' => 'page','method' => 'post'));?>
        <div class="row">
            <div class="col_12 margin-top--20">
                <a class="return-link" href="/qadmin/articles"><i class="material-icons">keyboard_arrow_left</i> Back To Articles</a>
            </div>
            <div class="col_12 margin-top--20">
                <h1>Categories</h1>
            </div>
            <div class="col_3">
                
                    <div class="page-links--container">
                        <div class="card">
                            <div class="card_header site_color">
                                <span class="card_title">Add A Category</span></div>
                                <div class="card_body">
                                    <div class="row">
                                        <div class="col_12">
                                             <label class="form_label" for="menuItemLinkTitle">Category Name</label>
                                             <?php echo Form::input(array('name' => 'categoryName', 'type' => 'text' ,'class' => 'form_input')); ?>
                                        </div>
                                        <div class="col_12">
                                             <label class="form_label" for="menuItemLinkTitle">Category Url</label>
                                             <?php echo Form::input(array('name' => 'categoryUrl', 'type' => 'text' ,'class' => 'form_input')); ?>
                                        </div>
                                        <div class="col_12">
                                             <label class="form_label" for="menuItemLinkTitle">Category Parent</label>
                                             <select class="form_input" name="categoryParent">
                                              <option value="">No Parent</option>
                                              <?php
                                                    if($data["category_data"]){
                                                        foreach ($data['category_data'] as $row) {
                                                            echo "<option value='$row->categoryId'>$row->categoryName</option>";
                                                        }
                                                    } ?>
                                             </select>
                                        </div>
                                        <div class="col_12">
                                             <label class="form_label" for="menuItemLinkTitle">Category Content</label>
                                             <?php echo Form::textBox(array('name' => 'categoryContent', 'type' => 'text' ,'class' => 'form_input')); ?>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="card_footer">
                                    <?php  echo Form::input(array('type' => 'submit', 'name' => 'submit', 'value' => 'Add Category', 'type' => 'submit',  'class' => 'button button_site_color')); ?>
                                </div>
                            </div>
                        </div>
              
            </div>
            <div class="col_9">
                 <div class="card">
                    <div class="card_header site_color">
                        <span class="card_title">Current Categories</span></div>
                        <div class="card_body">
                           <?php require_once('_categoryDisplay.php'); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php echo Form::close(); ?>
</section>
