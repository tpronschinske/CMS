<?php if($data['articleData']){
 $articleStatus = $data['articleData'][0]->articleStatus;
} ?>
    
<?php if($articleStatus == 1){ ?>
    <option value="1" <?php  echo('selected="selected"');  ?> >Active</option>
    <option value="0">Disabled</option>
<?php } else { ?>
    <option value="1">Active</option>
    <option value="0" <?php  echo('selected="selected"');  ?> >Disabled</option>
<?php } ?>