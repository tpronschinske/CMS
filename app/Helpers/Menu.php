<?php

namespace Helpers;

use Helpers\Database;

class Menu
{


	public function getMenu($keyId){

			 $db = Database::get();
			 $id = $keyId;
			 $data['menuItems'] = $db->select("SELECT * FROM " . PREFIX . "menuItems WHERE menuKey=:menuKey ORDER BY menuSort ASC", array(':menuKey' => $id));


			 if ($data['menuItems']){

                    $menuId = $data['menuItems'][0]->menuItemId;
                    $menu = '<ul class="main-menu" id="menu-'. $menuId .'">';

                    foreach ($data['menuItems'] as $row) {
                        $id = $row->menuItemId;
                        $link = $row->menuItemLink;
                        $linkName = $row->menuItemName;
                        $menuTitle = $row->menuItemLinkTitle;
                        $parent = $row->menuParent;
                        $hasSubMenu = $row->childLinks;

                    if ($hasSubMenu != 1){
                        if($parent == 0){
                            $menu .= '<li class="menu-item"><a href="'. $link .'" title="'. $menuTitle .'">'. $linkName .'</a></li>';
                        }
                    } else {
                        $menu .='<li class="menu-item"><a href="'. $link .'" title="'. $menuTitle .'">'. $linkName . '</a>';

                        $data['subMenuItems'] = $db->select("SELECT * FROM " . PREFIX . "menuItems WHERE menuParent=:menuItemId  ORDER BY menuSort ASC", array(':menuItemId' => $id));

                            if($data['subMenuItems']){
                                $menu .= '<ul class="sub-menu">';
                                foreach($data['subMenuItems'] as $item){
                                    $subLinkName = $item->menuItemName;
                                    $subLink = $item->menuItemLink;
                                    $subLinkTitle = $item->menuItemLinkTitle;
                                    $menu .= '<li class="sub-menu-item"><a href="'. $subLink .'" title="'. $subLinkTitle .'">'. $subLinkName  .'</a></li>';
                                }
                                $menu .= '</ul></li>';
                            }
                        }
                    }
                    $menu .= '</ul>';
                    return $menu;
                }
			   return 'Menu does not exist. Please Contact Your Administrator';

	}

}
