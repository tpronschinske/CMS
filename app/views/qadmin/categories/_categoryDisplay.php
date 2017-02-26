<?php


use \Helpers\Database;
$db = Database::get();


if($data['category_data']){
  
    $display = '<ul class="admin-menu">';

    foreach ($data['category_data'] as $row) {  
       $display .= '<li class="menu-item"><a href="/cat/'. $row->categoryUrl . ' target="_blank">' . $row->categoryName . '</a><a class="clickable-delete-link" href="/qadmin/categories/delete/' . $row->categoryId .'"><i class="material-icons">close</i></a></li>';
    }

    $display .= '</ul>';
    echo $display;
}

?>