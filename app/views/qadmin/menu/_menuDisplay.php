<?php


use \Helpers\Database;
$db = Database::get();

if ($data['menuItems']){

    $menuId = $data['menuItems'][0]->menuItemId;
    $menu = '<ul class="admin-menu" id="menu-'. $menuId .'">';

    foreach ($data['menuItems'] as $row) {
        $id = $row->menuItemId;
        $link = $row->menuItemLink;
        $linkName = $row->menuItemName;
        $menuTitle = $row->menuItemLinkTitle;
        $parent = $row->menuParent;
        $hasSubMenu = $row->childLinks;
        $sortNum = $row->menuSort;

    if ($hasSubMenu != 1){
        if($parent == 0){
            $menu .= '<li class="menu-item"><a href="'. $link .'" title="'. $menuTitle .'" target="_blank">'. $linkName .'</a> - <span class="sort-num"> Sort Order ('. $sortNum .')</span><a class="clickable-delete-link" href="/qadmin/menu/delete-item/' . $id .'"><i class="material-icons">close</i></a></li>';
        }
    } else {
        $menu .='<li class="menu-item"><a href="'. $link .'" title="'. $menuTitle .'" target="_blank">'. $linkName . '</a><a class="clickable-delete-link" href="/qadmin/menu/delete-item/' . $id .'"><i class="material-icons">close</i></a>';

        $data['subMenuItems'] = $db->select("SELECT * FROM " . PREFIX . "menuItems WHERE menuParent=:menuItemId", array(':menuItemId' => $id));

            if($data['subMenuItems']){
                $menu .= '<ul class="sub-menu">';
                foreach($data['subMenuItems'] as $item){
                    $subLinkId = $item->menuItemId;
                    $subLinkName = $item->menuItemName;
                    $subLink = $item->menuItemLink;
                    $subLinkTitle = $item->menuItemLinkTitle;
                    $menu .= '<li class="sub-menu-item"><a href="'. $subLink .'" title="'. $subLinkTitle .'" target="_blank">'. $subLinkName  .'</a><a class="clickable-delete-link" href="/qadmin/menu/delete-item/' . $subLinkId .'"><i class="material-icons">close</i></a></li>';
                }
                $menu .= '</ul></li>';
            }
        }
    }
    $menu .= '</ul>';
    echo $menu;
}


?>