<?php

use \Helpers\Form;
use \Helpers\Session;

?>


<section class="application_view">
    <?php echo Form::open(array('id' => 'article','method' => 'post'));?>
        <div class="row">
            <div class="col_12 margin-top--20">
                <h1>Create article</h1>
            </div>
            <div class="col_12">   
              
            </div>
            <div class="col_8">
                <div class="row margin-bottom--40">
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label is-required" for="articleName">Article Name</label>
                        <?php echo Form::input(array('name' => 'articleName', 'type' => 'text' ,'class' => 'form_input', 'required' => 'required')); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                     
                    </div>
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label is-required" for="articleName">Article Title</label>
                        <?php echo Form::input(array('name' => 'articleTitle', 'type' => 'text' ,'class' => 'form_input', 'required' => 'required')); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                     
                    </div>
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label is-required" for="articleUrl">Article Url</label>
                        <?php echo Form::input(array('name' => 'articleUrl', 'type' => 'text' ,'class' => 'form_input', 'required' => 'required')); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                    
                    </div>
                    <div class="col_11 margin-bottom--5">
                        <label class="form_label" for="articleContent">Article Content</label>
                    </div>
                    <div class="col_11">
                        <?php echo Form::textBox(array('name' => 'articleContent', 'type' => 'text' ,'class' => 'article-content margin-top--10')); ?>
                    </div>
                    <div class="col_1 popover-help--content">
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col_11 margin-bottom--20">
                        <h3>SEO Information</h3>
                    </div>
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label" for="articleMetaTitle">SEO/Meta Title</label>
                        <?php echo Form::input(array('name' => 'articleMetaTitle', 'type' => 'text' ,'class' => 'form_input')); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                      
                    </div>
                    <div class="col_11 margin-bottom--10">
                        <label class="form_label" for="articleMetaDesc">SEO/Meta Description</label>
                        <?php echo Form::textBox(array('name' => 'articleMetaDescription', 'type' => 'text' ,'class' => 'form_input')); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                       
                    </div>
                     <div class="col_11 margin-bottom--40">
                        <label class="form_label" for="articleMetaKeyword">SEO/Meta Keywords</label>
                        <?php echo Form::input(array('name' => 'articleMetaKeywords', 'type' => 'text' ,'class' => 'form_input')); ?>
                    </div>
                    <div class="col_1 popover-help--column">
                      
                    </div>
                </div>
            </div>

            <div class="col_4 border-left">
                <div class="row">
                    <div class="col_12 margin-bottom--10">
                        <label class="form_label" for="articleStatus">Article Status</label>
                        <select name="articleStatus" class="form_select">
                            <option value="1">Active</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>

                    <div class="col_12 margin-bottom--10">
                        <label class="form_label" for="articleCategory">Category</label>
                        <select name="articleCategory" class="form_select">
					       <option value="0">No category</option>
                              <?php
                                if($data["categories"]){
                               foreach ($data['categories'] as $row) {
                                        echo "<option value='$row->categoryId'>$row->categoryName</option>";
                                }} ?>
                        </select>
                    </div>

                    <div class="col_12 margin-top--10">
                        <?php  echo Form::input(array('type' => 'submit', 'name' => 'submit', 'value' => 'Publish', 'type' => 'submit',  'class' => 'button button_site_color width-100')); ?>
                    </div>

                </div>



                <div class="row">
                    <div class="col_12">
                        <?php 
                        $user = Session::get('user');
                        echo Form::input(array('name' => 'articleCreatedBy', 'type' => 'hidden', 'value' => ($user))); ?>
                    </div>
                </div>

                <div class="row margin-top--40">
                   
                    <div class="col_12">
                        <label class="form_label" for="articleBannerImg">Article Image</label>
                        <div class="image-selector">
                            <div class="image-select-input">
                                <?php echo Form::input(array('name' => 'articleImage', 'id' => 'bannerImage', 'type' => 'text' ,'class' => 'form_input')); ?>
                            </div>
                             <div class="image-select-button">
                                <button id="add-img" type="button" class="button button_site_color"><i class="material-icons">folder</i></button>
                            </div>
                        </div>
                          <div class="banner-preview">
                            <img class="newBanner" src="" />
                        </div>
                        
                        
                    </div>
                </div>

            </div>
        </div>
     </div>
    <?php echo Form::close(); ?>
</section>
<?php include("_editor.php"); ?>