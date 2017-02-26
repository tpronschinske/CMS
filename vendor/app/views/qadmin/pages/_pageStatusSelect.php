<?php if($data['pageData']){
 $pageStatus = $data['pageData'][0]->pageStatus;
} ?>
    
<?php if($pageStatus == 1){ ?>
    <option value="1" <?php  echo('selected="selected"');  ?> >Active</option>
    <option value="0">Disabled</option>
<?php } else { ?>
    <option value="1">Active</option>
    <option value="0" <?php  echo('selected="selected"');  ?> >Disabled</option>
<?php } ?>