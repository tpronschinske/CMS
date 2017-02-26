<?php namespace Models;

class Settings extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Settings(){
		return $this->db->select("SELECT * FROM " . PREFIX . "siteSettings");
	}

	public function getSettings(){
		return $this->db->select("SELECT * FROM " . PREFIX . "siteSettings");
	}

    public function updateSettings($data, $where){
		 $this->db->update(PREFIX . "siteSettings", $data, $where);
	}

}


?>
