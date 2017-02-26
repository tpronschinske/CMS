<?php namespace Models;

class ContentArea extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function ContentArea(){
		return $this->db->select("SELECT * FROM " . PREFIX . "contentArea");
	}

	public function getContentAreas(){
		return $this->db->select("SELECT * FROM " . PREFIX . "contentArea");
	}

    public function updateContentArea($data, $where){
		 $this->db->update(PREFIX . "contentArea", $data, $where);
	}

}


?>