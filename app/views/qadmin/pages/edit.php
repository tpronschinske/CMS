<?php

use \Helpers\Form;
use \Helpers\Session;
use \Core\Error;

?>

<?php if($data['pageData']) { ?>

<section class="application_view">
    <?php echo Form::open(array('id' => 'page','method' => 'post'));?>
        <div class="row">
            <div class="col_12 margin-top--20">
                <h1>Edit Page</h1>
            </div>
            <div class="col_12">   
                <?php require_once('_error.php'); ?>
            </div>
    
            <div class="col_8">
                <div class="row margin-bottom--40">
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label is-required" for="pageName">Page Name</label>
                        <?php echo Form::input(array('name' => 'pageName', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['pageData'][0]->pageName)));  ?>
                    </div>
                     <div class="col_1 popover-help--column">
                       <?php include('_pageNamePopover.php'); ?>
                    </div>
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label is-required" for="pageUrl">Page Url</label>
                        <?php 
                            $pageUrl = $data['pageData'][0]->pageUrl;
                            $urlTrimmed = explode('/', $pageUrl);
                            $newUrl = trim(end($urlTrimmed));
                        ?>
                        <?php echo Form::input(array('name' => 'pageUrl', 'type' => 'text' ,'class' => 'form_input', 'value' => ($newUrl))); ?>
                        <div class="current-page--url">
                            <span class="current-directory">Current Url -</span><span class="currentUrl">http://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo($pageUrl); ?></span>             
                        </div>
                    </div>
                     <div class="col_1 popover-help--column">
                       <?php include('_pageUrlPopover.php'); ?>
                    </div>
                    <div class="col_11 margin-bottom--5">
                        <label class="form_label" for="pageContent">Page Content</label>
                    </div>
                    <div class="col_11">
                        <?php echo Form::textBox(array('name' => 'pageContent', 'type' => 'text' ,'class' => 'page-content margin-top--10', 'value' => ($data['pageData'][0]->pageContent))); ?>
                    </div>
                    <div class="col_1 popover-help--content">
                       <?php include('_pageContentPopover.php'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col_11 margin-bottom--20">
                        <h3>SEO Information</h3>
                    </div>
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label" for="pageMetaTitle">SEO/Meta Title</label>
                        <?php echo Form::input(array('name' => 'pageMetaTitle', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['pageData'][0]->pageMetaTitle))); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                       <?php include('_metaTitlePopover.php'); ?>
                    </div>
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label" for="pageMetaDesc">SEO/Meta Description</label>
                        <?php echo Form::textBox(array('name' => 'pageMetaDesc', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['pageData'][0]->pageMetaDesc))); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                       <?php include('_metaDescPopover.php'); ?>
                    </div>
                     <div class="col_11 margin-bottom--40">
                        <label class="form_label" for="pageMetaKeyword">SEO/Meta Keywords</label>
                        <?php echo Form::input(array('name' => 'pageMetaKeyword', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['pageData'][0]->pageMetaKeyword))); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                       <?php include('_metaKeywordPopover.php'); ?>
                    </div>
                </div>
            </div>

            <div class="col_4 border-left">
                <div class="row">
                    <div class="col_12 margin-bottom--10">
                        <label class="form_label" for="pageStatus">Page Status</label>
                        <select name="pageStatus" class="form_select">
                            <?php include('_pageStatusSelect.php'); ?> 
                        </select>
                    </div>

                    <div class="col_12 margin-bottom--10">
                        <label class="form_label" for="pageParent">Parent Page</label>
                        <select name="pageParent" class="form_select">
					        <option value="0">No Parent Page...</option>
                            <?php include('_parentPageSelect.php'); ?> 
                        </select>
                    </div>

                    <div class="col_12 margin-top--10">
                        <?php echo Form::input(array('type' => 'submit', 'name' => 'submit', 'value' => 'Update', 'class' => 'button button_site_color width-100')); ?>
                    </div>
                     <div class="col_12 margin-top--10">
                        <a class="button button_app_color width-100" href="/<?php echo($pageUrl); ?>" target="_blank">View Page</a>
                    </div>

                </div>

                <div class="row margin-top--40">
                 <div class="col_12 margin-bottom--40">
                        <div class="add-to-menu-container">
                            <label class="form_label" for="pageParent">Add To Menu</label>
                        </div>
                        <?php include('_menusSelect.php'); ?>
                    </div>
                    <div class="col_12">
                        <label class="form_label" for="pageBannerImg">Page Banner</label>
                        <div class="image-selector">
                            <div class="image-select-input">
                                <?php echo Form::input(array('name' => 'pageBannerImg', 'id' => 'bannerImage', 'type' => 'text' ,'class' => 'form_input', 'value' => ($data['pageData'][0]->pageBannerImg))); ?>
                            </div>
                             <div class="image-select-button">
                                <button id="add-img" type="button" class="button button_site_color"><i class="material-icons">folder</i></button>
                            </div>
                        </div>
                        <div class="banner-preview">
                            <img class="newBanner" src="<?php echo($data['pageData'][0]->pageBannerImg); ?>" />
                        </div>
                        
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col_12">
                        <?php 
                        $user = Session::get('user');
                        echo Form::input(array('name' => 'pageCreatedBy', 'type' => 'hidden', 'value' => ($user))); ?>
                    </div>
                </div>

                

            </div>
        </div>
     </div>
    <?php echo Form::close(); ?>
</section>
<?php } ?>
<?php include('_editor.php'); ?>
<?php include('_validate.php'); ?>