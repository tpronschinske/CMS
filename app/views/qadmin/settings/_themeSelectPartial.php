

<?php

  foreach(glob('app/templates/*', GLOB_ONLYDIR) as $dir) {
        $dir = str_replace('app/templates/', '', $dir);
        if($dir != 'admin'){ ?>
            <option value="<?php echo $dir; ?>" <?php if($theme == $dir){ echo('selected="selected"'); } ?> ><?php echo $dir; ?></option>
<?php  }
    }
?>
