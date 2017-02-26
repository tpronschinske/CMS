<?php namespace Models;

class Articles extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Articles(){
		return $this->db->select("SELECT * FROM " . PREFIX . "articles");
	}

	public function getArticle($articleUrl){
		return $this->db->select("SELECT * FROM " . PREFIX . "articles WHERE articleUrl = :articleUrl", array(':articleUrl' => $articleUrl));
	}

	public function getRecentArticles(){
		return $this->db->select("SELECT * FROM " . PREFIX . "articles ORDER BY articleId desc limit 5");
	}

	public function getAllArticles(){
		return $this->db->select("SELECT * FROM " . PREFIX . "articles");
	}

	public function getAllArticlesPaged($limit){
		return $this->db->select('
      SELECT
      *,
      (SELECT count(articleId) FROM '.PREFIX.'articles) as total
     FROM '.PREFIX.'articles '.$limit);
	}

	public function getArticleById($articleId){
		return $this->db->select("SELECT * FROM " . PREFIX . "articles WHERE articleId=:articleId", array(':articleId' => $articleId));
	}

	public function getArticleId($articleId){
		$data = $this->db->select("SELECT articleId FROM " . PREFIX . "articles WHERE articleId=:articleId", array(':articleId' => $articleId));
		return $data[0]->articleId;
	}

	public function getArticleUrlById($articleId){
		$data = $this->db->select("SELECT articleUrl FROM " . PREFIX . "articles WHERE articleId=:articleId", array(':articleId' => $articleId));
		return $data[0]->articleUrl;
	}

	public function createArticle($articleData){
		 $this->db->insert(PREFIX . 'articles', $articleData);
	}

	public function updateArticle($data, $where){
		 $this->db->update(PREFIX . "articles", $data, $where);
	}

	public function deleteArticle($articleId){
	     $where = array('articleId' => $articleId);
	     $this->db->delete(PREFIX . 'articles', $where);
	}



}


?>
