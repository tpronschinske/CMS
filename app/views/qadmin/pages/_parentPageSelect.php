<?php if($data['pagesUrlData']){
    foreach($data['pagesUrlData'] as $row){ ?>

    <?php if($data['pageData']) { 
        
        $parent = $data['pageData'][0]->pageParent;

        
        ?>

    

    <option value="<?php echo $row->pageId; ?>" <?php if($parent == $row->pageId){ echo('selected="selected"'); } ?> ><?php echo $row->pageName; ?></option>

    <?php } else { ?>

    <option value="<?php echo $row->pageId; ?>" ><?php echo $row->pageName; ?></option>

<?php }	
    } 
} ?>