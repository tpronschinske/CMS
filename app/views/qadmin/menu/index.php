<section class="application_view">
    <div class="row">
        <div class="col_10 col_12_lg">
            <div class="row">
                <div class="col_12 margin-top--20 margin-bottom--20">
                    <div class="col_9">
                        <h1>Menus</h1>
                    </div>
                    <div class="col_3 text_align_right">
                        <a href="/qadmin/menu/add" class="button button_site_color">Add New</a>
                    </div>
                </div>
                <div class="col_12">
                    <?php echo \helpers\session::pull('message'); ?>
                </div>

                <div class="col_12 col_12_md">
                <?php  if($data['menu']){ 
                    foreach ($data['menu'] as $row) { ?>
                        <div class="col_4 col_12_md">
                            <div class="menu-data--item">
                                <div class="col_12">
                                    <div class="menu-name">
                                        <h3><?php echo $row->menuName; ?></h3>
                                    </div>
                                </div>
                                <div class="col_12">
                                    <div class="page-actions">
                                        <a class="page-action--item" href="/qadmin/menu/edit/<?php echo $row->menuKey; ?>">Edit</a>
                                        <a class="page-action--item" href="/qadmin/menu/delete/<?php echo $row->menuId; ?>">Delete</a>
                                    </div>
                                </div>
                             </div>
                          </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                </div>
            </div>
        </div>
        <div class="col_2"></div>
    </div>
</section>