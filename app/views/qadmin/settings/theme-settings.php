<?php

use \Helpers\Form;
if($data['settingsData']) {

    
$theme = $data['settingsData'][0]->siteTheme;
$themeImage = '/app/templates/' . $theme . '/' . $theme . '-theme.png';
?>

<?php echo Form::open(array('id' => 'settings','method' => 'post'));?>
<section class="application_view">
<div class="row">
    <div class="col_10 col_12_lg">
        <div class="row">
            <div class="col_12 margin-top--20">
                <div class="col_9">
                    <h1>Theme Settings</h1>
                </div>
            </div>
            <div class="col_12">
                <?php echo \helpers\session::pull('message'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm">
                    <label class="form_label" for="siteTheme">Site Theme</label>
                </div>
                <div class="col_6 col_12_sm">
                    <select name="siteTheme" class="form_input">
                        <?php include('_themeSelectPartial.php'); ?> 
                    </select>
                </div>
                <div class="col_4 col_12_sm"></div>
            </div>
            <div class="col_10 col_12_sm margin-top--20 margin-bottom--20">
                <div class="col_3 col_12_md">
                    <div class="current-theme">
                        <img src="<?php echo($themeImage) ?>" />
                    </div>
                    <div class="theme-name current">Current Theme - <?php echo $theme; ?></div>
                </div>
            
                <?php
                    foreach(glob('app/templates/*', GLOB_ONLYDIR) as $dir) {
                        $dir = str_replace('app/templates/', '', $dir);
                        if($dir != 'admin'){
                            echo '<div class="col_3 col_12_md"><div class="themes"><div class="theme-item"><img src="/app/templates/' . $dir . '/' . $dir . '-theme.png" /></div><div class="theme-name">Theme - ' . $dir . '</div></div></div>';
                        }
                    }
                ?>
                
            </div>

            <div class="col_10 col_12_sm">
                <div class="col_2 align-middle col_12_sm">
                    <label class="form_label" for="siteAdminTheme">Administrator Theme</label>
                </div>
                <div class="col_6 col_12_sm">
                    <?php echo Form::input(array('name' => 'siteAdminTheme', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['settingsData'][0]->siteAdminTheme))); ?>
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
