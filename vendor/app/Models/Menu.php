<?php namespace Models;

class Menu extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Menu(){
		return $this->db->select("SELECT * FROM " . PREFIX . "menu");
	}

	public function getAllMenus(){
		return $this->db->select("SELECT * FROM " . PREFIX . "menu");
	}

	public function getAllMenuItems(){
	    return $this->db->select("SELECT * FROM " . PREFIX . "menuItems");
	}

	public function getMenuById($menuId){
		return $this->db->select("SELECT * FROM " . PREFIX . "menu WHERE menuId=:menuId", array(':menuId' => $menuId));
	}

	public function createMenu($menu){
		 $this->db->insert(PREFIX . 'menu', $menu);
	}

	public function createMenuItem($menu){
		 $this->db->insert(PREFIX . 'menuItems', $menu);
	}

	public function updateMenu($data, $where){
		 $this->db->update(PREFIX . "menu", $data, $where);
	}

	public function deleteMenu($menuId){
	     $this->db->delete("DELETE FROM " . PREFIX . "menu WHERE menuId=:menuId", array(':menuId' => $menuId));
	}

	public function deleteMenuItem($menuId){
	     $where = array('menuItemId' => $menuId);
	     $this->db->delete(PREFIX . 'menuItems', $where);
	}

    public function getMainMenuItems($menuId){
	     return $this->db->select("SELECT * FROM " . PREFIX . "menuItems WHERE menuKey=:menuKey", array(':menuKey' => $menuId));
	}

	public function getMenuByKey($keyId){
		return $this->db->select("SELECT * FROM " . PREFIX . "menuItems WHERE menuKey=:menuKey", array(':menuKey' => $keyId));
	}
	public function getLastMenuKey(){
		$data = $this->db->select("SELECT menuKey FROM " . PREFIX . "menu ORDER BY menuId DESC LIMIT 1");
		return $data[0]->mainMenuKey;
	}

	public function updateMenuItems($data, $where){
		 $this->db->update(PREFIX . "menuItems", $data, $where);
	}

	public function getMainMenuItemIdByUrl($menuUrl){
		 $cleanUrl = '/' . $menuUrl;
	     $data = $this->db->select("SELECT menuItemId FROM " . PREFIX . "menuItems WHERE menuItemLink=:menuItemLink", array(':menuItemLink' => $cleanUrl));
		 return $data[0]->menuItemId;
	}


	public function getAllMenuItemsInMenuByUrl($pageUrl){
		$cleanUrl = '/' . $pageUrl;
		return $this->db->select("SELECT * FROM " . PREFIX . "menuItems JOIN " . PREFIX . "menu on " . PREFIX . "menu.menuKey= " . PREFIX . "menuItems.menuKey  WHERE menuItemLink=:menuItemLink", array(':menuItemLink' => $cleanUrl));	
	}


}


?>
