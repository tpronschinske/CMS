<section class="application_view">
    <div class="row">
        <div class="col_10 col_12_lg">
            <div class="row">
                <div class="col_12 margin-top--20">
                    <div class="col_9">
                        <h1>Articles</h1>
                    </div>
                    <div class="col_3 text_align_right">
                        <a href="/qadmin/articles/add" class="button button_site_color">Add New</a>
                    </div>
                </div>
                <div class="col_12">
                    <?php echo \helpers\session::pull('message'); ?>
                </div>
                <div class="col_12">
                <?php  if($data['articles_data']){ 
                    foreach ($data['articles_data'] as $row) { ?>
                        <div class="page-data--item">
                            <div class="col_8 col_12_sm">
                                <div class="col_12">
                                    <div class="page-name">
                                        <h3><?php if($row->parentarticle > 0){  echo '-'; ?> <?php } ?><?php echo $row->articleName; ?></h3>
                                    </div>
                                </div>
                                <div class="col_12">
                                    <div class="page-actions">
                                        <?php if($row->articleStatus != 0){ ?>
                                            <a class="page-action--item" href="/articles/<?php echo $row->articleUrl; ?>" target="_blank">View</a>
                                        <?php } ?>
                                        <a class="page-action--item" href="/qadmin/articles/edit/<?php echo $row->articleId; ?>">Edit</a>
                                        <a class="page-action--item" href="/qadmin/articles/delete/<?php echo $row->articleId; ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col_4 col_12_sm">   
                                <div class="date-created"><span class="bold-500">Date Created: </span> <?php echo  date('m/d/Y', strtotime($row->dateCreated)); ?></div>
                                <div class="page-status"><span class="bold-500">Article Status: </span> <?php include('_articleStatus.php'); ?></div>
                                <div class="created-by"><span class="bold-500">Created By: </span></div></div>
                            </div>
                        <?php } ?>
                            <div class="align_right">
                                <?php echo $data['articleLinks']; ?>
                            </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col_2"></div>
    </div>
</section>