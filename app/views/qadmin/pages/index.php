<section class="application_view">
    <div class="row">
        <div class="col_10 col_12_lg">
            <div class="row">
                <div class="col_12 margin-top--20">
                    <div class="col_9">
                        <h1>Pages</h1>
                    </div>
                    <div class="col_3 text_align_right">
                        <a href="/qadmin/pages/add" class="button button_site_color">Add New</a>
                    </div>
                </div>
                <div class="col_12">
                    <?php echo \helpers\session::pull('message'); ?>
                </div>
                <div class="col_12">
                <?php  if($data['pages_data']){ 
                    foreach ($data['pages_data'] as $row) { ?>
                        <div class="page-data--item">
                            <div class="col_8 col_12_sm">
                                <div class="col_12">
                                    <div class="page-name">
                                        <h3><?php if($row->parentPage > 0){  echo '-'; ?> <?php } ?><?php echo $row->pageName; ?></h3>
                                    </div>
                                </div>
                                <div class="col_12">
                                    <div class="page-actions">
                                        <?php if($row->pageStatus != 0){ ?>
                                            <a class="page-action--item" href="/<?php echo $row->pageUrl; ?>" target="_blank">View</a>
                                        <?php } ?>
                                        <a class="page-action--item" href="/qadmin/pages/edit/<?php echo $row->pageId; ?>">Edit</a>
                                        <a class="page-action--item" href="/qadmin/pages/delete/<?php echo $row->pageId; ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col_4 col_12_sm">   
                                <div class="date-created"><span class="bold-500">Date Created: </span> <?php echo  date('m/d/Y', strtotime($row->pageDateCreated)); ?></div>
                                <div class="page-status"><span class="bold-500">Page Status: </span><?php include('_pageStatusDisplay.php'); ?></div>
                                <div class="created-by"><span class="bold-500">Created By: </span><?php echo $row->pageCreatedBy; ?></div></div>
                            </div>
                        <?php } ?>
                            <div class="align_right">
                                <?php echo $data['pageLinks']; ?>
                            </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col_2"></div>
    </div>
</section>