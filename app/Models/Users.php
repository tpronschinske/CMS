<?php namespace Models;

class Users extends \Core\Model {

	public function __construct(){

		parent::__construct();

	}

	public function Users(){
		return $this->db->select("SELECT * FROM " . PREFIX . "users");
	}

	public function getAllUsers(){
		return $this->db->select("SELECT * FROM " . PREFIX . "users");
	}

	public function getUserById($userId){
		return $this->db->select("SELECT * FROM " . PREFIX . "users WHERE userId=:userId", array(':userId' => $userId));
	}

	public function getUsersName($username){
		$data = $this->db->select("SELECT usersName FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		return $data[0]->usersName;
	}

	public function getUsersId($username){
		$data = $this->db->select("SELECT userId FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		return $data[0]->userId;
	}

}


?>
