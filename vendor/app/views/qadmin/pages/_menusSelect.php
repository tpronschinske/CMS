


<?php
    if($data['menus']){

        echo '<div class="menu-pages-container"><div class="form_checkbox">';

        if($data['menuItemsChecked']){ ?>

    <?php echo '<div class="col_12">'; 

        $arrayMenuSize = sizeOf($data['menus']);

        $arrayMenuItemSize = sizeOf($data['menuItemsChecked']);

        for($x = 0; $x < $arrayMenuSize; $x++){ 
          
         for($s = 0; $s < $arrayMenuItemSize; $s++){
            if($data['menuItemsChecked'][$s]->menuKey == $data['menus'][$x]->menuKey){  ?>

                <?php echo '<div class="form_checkbox_item">'; ?>
                    <input class="checkbox" name="menus[]" type="checkbox" id="check-<?php echo $data['menus'][$x]->menuKey; ?>" value="<?php echo $data['menus'][$x]->menuKey; ?>" checked>
                    <label tabindex="1" for="check-<?php echo $data['menus'][$x]->menuKey; ?>" class="checkbox_label"><?php echo $data['menus'][$x]->menuName; ?></label>
                <?php echo '</div>'; ?> 

         <?php     
              } 
             } ?>

             <?php 
                 if($data['menuItemsChecked'][$x]->menuKey != $data['menus'][$x]->menuKey){  ?>
                 
                <?php echo '<div class="form_checkbox_item">'; ?>
                    <input class="checkbox" name="menus[]" type="checkbox" id="check-<?php echo $data['menus'][$x]->menuKey; ?>" value="<?php echo $data['menus'][$x]->menuKey; ?>">
                    <label tabindex="1" for="check-<?php echo $data['menus'][$x]->menuKey; ?>" class="checkbox_label"><?php echo $data['menus'][$x]->menuName; ?></label>
                <?php echo '</div>'; ?> 
            

        <?php  }
            }        
          }
        echo '</div>';  
        echo '</div></div>';
    }

    
?>