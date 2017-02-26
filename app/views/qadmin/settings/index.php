<?php

use \Helpers\Form;

?>

<?php echo Form::open(array('id' => 'settings','method' => 'post'));?>
<?php if($data['settingsData']) { ?>
<section class="application_view">
<div class="row">
    <div class="col_10 col_12_lg">
        <div class="row">
            <div class="col_12 margin-top--20">
                <div class="col_9">
                    <h1>Site Settings</h1>
                </div>
            </div>
            <div class="col_12">
                <?php echo \helpers\session::pull('message'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm">
                    <label class="form_label" for="siteName">Site Name</label>
                </div>
                <div class="col_6 col_12_sm">
                    <?php echo Form::input(array('name' => 'siteName', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['settingsData'][0]->siteName))); ?>
                </div>
                <div class="col_4 col_12_sm"></div>
            </div>

            <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm">
                    <label class="form_label" for="siteLogo">Site Logo </label>
                </div>
                <div class="col_6 col_12_sm">
                    <div class="image-selector">
                        <div class="image-select-input">
                            <?php echo Form::input(array('name' => 'siteLogo', 'id' => 'siteLogo', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['settingsData'][0]->siteLogo))); ?>
                        </div>
                            <div class="image-select-button">
                            <button id="change-img" type="button" class="button button_site_color"><i class="material-icons">folder</i></button>
                        </div>
                    </div>
                </div>
                <div class="col_4 col_12_sm">
                    <div class="site-logo-preview">
                        <img class="site-logo" src="<?php echo($data['settingsData'][0]->siteLogo); ?>" />
                    </div>
                </div>
            </div>

            <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm">
                    <label class="form_label" for="siteAddress">Site Address (URL)</label>
                </div>
                <div class="col_6 col_12_sm">
                    <?php echo Form::input(array('name' => 'siteAddress', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['settingsData'][0]->siteAddress))); ?>
                </div>
                <div class="col_4 col_12_sm"></div>
            </div>

             <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm">
                    <label class="form_label" for="siteEmail">Email Address</label>
                </div>
                <div class="col_6 col_12_sm">
                    <?php echo Form::input(array('name' => 'siteEmail', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['settingsData'][0]->siteEmail))); ?>
                </div>
                <div class="col_4 col_12_sm"></div>
            </div>

            <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm">
                    <label class="form_label" for="siteLanguage">Site Language</label>
                </div>
                <div class="col_6 col_12_sm">
                    <?php echo Form::input(array('name' => 'siteLanguage', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['settingsData'][0]->siteLanguage))); ?>
                </div>
                <div class="col_4 col_12_sm"></div>
            </div>

            <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm">
                    <label class="form_label" for="siteLocation">Site Location</label>
                </div>
                <div class="col_6 col_12_sm">
                    <?php echo Form::input(array('name' => 'siteLocation', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['settingsData'][0]->siteLocation))); ?>
                </div>
                <div class="col_4 col_12_sm"></div>
            </div>

             <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm"></div>
                <div class="col_6 col_12_sm">
                     <?php  echo Form::input(array('type' => 'submit', 'name' => 'submit', 'value' => 'Update', 'type' => 'submit',  'class' => 'button button_site_color')); ?>
                </div>
                <div class="col_4 col_12_sm"></div>
            </div>
        </div>
</section>
<?php } ?>
<?php echo Form::close(); ?>
<?php include('_filemanagerPartial.php'); ?>