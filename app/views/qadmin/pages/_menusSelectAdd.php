<?php if($data['menus']){ ?>

    <?php foreach($data['menus'] as $row){ ?>

        <?php echo '<div class="form_checkbox_item">'; ?>
            <input class="checkbox" name="menus[]" type="checkbox" id="check-<?php echo $row->menuKey; ?>" value="<?php echo $row->menuKey; ?>">
            <label tabindex="1" for="check-<?php echo $row->menuKey; ?>" class="checkbox_label"><?php echo $row->menuName; ?></label>
        <?php echo '</div>'; ?> 

    <?php  } ?>
<?php  } ?>