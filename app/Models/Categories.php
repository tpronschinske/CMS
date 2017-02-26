<?php namespace Models;

class Categories extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Categories(){
		return $this->db->select("SELECT * FROM " . PREFIX . "categories");
	}

	public function getCategoryById($catId){
		return $this->db->select("SELECT * FROM " . PREFIX . "categories WHERE categoryId = :categoryId", array(':categoryId' => $catId));
	}

  public function getCategoryIdByUrl($catUrl){
		$data = $this->db->select("SELECT categoryId FROM " . PREFIX . "categories WHERE categoryUrl = :categoryUrl", array(':categoryUrl' => $catUrl));
    return $data[0]->categoryId;
	}

  	public function getAllCategoriesPaged($limit){
		return $this->db->select('
      SELECT
      *,
      (SELECT count(categoryId) FROM '.PREFIX.'categories) as total
     FROM '.PREFIX.'categories '.$limit);
	}

	public function getAllCategories(){
		$data = $this->db->select("SELECT * FROM " . PREFIX . "categories");
    return $data;
	}

	public function createCategory($catData){
		 $this->db->insert(PREFIX . 'categories', $catData);
	}

	public function updateCategory($data, $where){
		 $this->db->update(PREFIX . "categories", $data, $where);
	}

	public function deleteCategory($catId){
	     $where = array('pageId' => $catId);
	     $this->db->delete(PREFIX . 'categories', $where);
	}



}


?>
