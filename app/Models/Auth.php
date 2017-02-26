<?php

namespace Models;

class Auth extends \Core\Model {

	public function getHash($username){
		$data = $this->db->select("SELECT userPassword FROM ". PREFIX ."users WHERE username = :username", array(':username' => $username));
		return $data[0]->userPassword;
	}

	public function getID($username){
		$data = $this->db->select("SELECT userId FROM " . PREFIX . "users WHERE username = :username", array(':username' => $username));
		return $data[0]->userPassword;
	}


}


?>
