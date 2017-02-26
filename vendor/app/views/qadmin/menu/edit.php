<?php

use \Helpers\Form;
use \Helpers\Session;
use \Core\Error;

?>

<section class="application_view">
    <?php echo Form::open(array('id' => 'page','method' => 'post'));?>
        <div class="row">
            <div class="col_12 margin-top--20">
                <a class="return-link" href="/qadmin/menu"><i class="material-icons">keyboard_arrow_left</i> Back To Menus</a>
            </div>
            <div class="col_12 margin-top--20">
                <h1>Edit Menu</h1>
            </div>
            <div class="col_3">
                 <?php if($data['pageLinks']){ ?>
                    <div class="page-links--container">
                        <div class="card">
                            <div class="card_header site_color">
                                <span class="card_title">Pages</span></div>
                                <div class="card_body">
                                    <div class="row">
                                        <div class="col_12">
                                            <label class="form_label" for="addPage">Add To Menu</label>
                                            <select name="addPage" class="form_input">
                                                <?php foreach ($data['pageLinks'] as $row) {
    
                                                    echo "<option value='$row->pageId'>$row->pageName</option>";
                                                
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col_12">
                                            <label class="form_label" for="parentItem">Parent Menu Item</label>
                                            <select name="parentItem" class="form_input">
                                                <option value='0'>No Parent</option>
                                                <?php foreach ($data['menuItems'] as $row) {
                                                    if($row->menuItemId != 1){
                                                        echo "<option value='$row->menuItemId'>$row->menuItemName</option>";
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                         <div class="col_12">
                                             <label class="form_label" for="menuItemName">Menu Item Name</label>
                                             <?php echo Form::input(array('name' => 'menuItemName', 'type' => 'text' ,'class' => 'form_input')); ?>
                                        </div>
                                         <div class="col_12">
                                             <label class="form_label" for="menuItemLinkTitle">Menu Link Title</label>
                                             <?php echo Form::input(array('name' => 'menuItemLinkTitle', 'type' => 'text' ,'class' => 'form_input')); ?>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="card_footer">
                                    <?php  echo Form::input(array('type' => 'submit', 'name' => 'submit', 'value' => 'Add Link', 'type' => 'submit',  'class' => 'button button_site_color')); ?>
                                </div>
                            </div>
                        </div>
                 <?php } ?>
            </div>
            <div class="col_9">
                 <div class="card">
                    <div class="card_header site_color">
                        <span class="card_title">Menu Links</span></div>
                        <div class="card_body">
                             <?php if($data['menu']){ ?>
                            <h4><?php echo $data['menu'][0]->menuName; ?></h4>
                            <?php } ?>
                            <?php include('_menuDisplay.php'); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php echo Form::close(); ?>
</section>

