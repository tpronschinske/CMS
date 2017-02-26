<?php namespace Controllers;

use \Core\View;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Paginator;
use \Helpers\Url;
use Helpers\AjaxHandler as Ajax;

class AdminArticlesController extends Controller {

    private $_articles;
    private $_categories;

    public function __construct() {

      if(!Session::get(loggedin)){
        Url::redirect('login');
      }

    $this->_articles = new \Models\Articles();
    $this->_categories = new \Models\Categories();

    }


    public function index()
    {
        $data['title'] = 'CMS';
        $data['welcome_message'] = 'Articles';
        $data['articles_data'] = $this->_articles->getAllArticles();
		

        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/articles/index', $data);
        View::renderTemplate('footer', $data, 'admin');
    }



    public function createArticle()
    {

        $data['title'] = 'CMS';
        $data['welcome_message'] = 'articles';
        $data['categories'] = $this->_categories->getAllCategories();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $articleName = $_POST["articleName"];
            $articleTitle = $_POST["articleTitle"];
            $articleUrl = $_POST["articleUrl"];
            $articleContent = $_POST["articleContent"];
            $articleImage = $_POST["articleImage"];
            $articleMetaTitle = $_POST["articleMetaTitle"];
            $articleMetaDesc = $_POST["articleMetaDescription"];
            $articleMetaKeywords = $_POST["articleMetaKeywords"];
            $articleStatus = $_POST["articleStatus"];
            $articleCategory = $_POST["articleCategory"];
            $articleCreatedBy = $_POST["articleCreatedBy"];

            if($articleName != null){

            $articleData = array(
                'articleName' => $articleName,
                'articleTitle' => $articleTitle,
                'articleUrl' => $articleUrl,
                'articleContent' => $articleContent,
                'articleMetaTitle' => $articleMetaTitle,
                'articleMetaKeywords' => $articleMetaKeywords,
                'articleMetaDescription' => $articleMetaDesc,
                'articleStatus' => $articleStatus,
                'articleCreatedBy' => $articleCreatedBy,
                'articleImage' => $articleImage,
                'categoryId' => $articleCategory
            );

         

            $this->_articles->createArticle($articleData);
            Session::set('message', '<div class="message message_success"><h6 class="white lowecase">Success!</h6> <p>The <span class="bold">' . $articleName .'</span> article was created successfully.</p></div>');
            Url::redirect('qadmin/articles');
            } else {
              $error[] = '<h3 class="white">Error!</h3><p>Your request cannot be processed. You must have a Article Name, Title, and Url to create a webpage.</p>';
            }

        }

     
        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/articles/add', $data, $error);
        View::renderTemplate('footer', $data, 'admin');
    }

    public function editArticle($articleId) {

        $data['title'] = "Edit article";
        $data['articleData'] = $this->_articles->getArticleById($articleId);
        $data['categories'] = $this->_categories->getAllCategories();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $articleName = $_POST["articleName"];
            $articleTitle = $_POST["articleTitle"];
            $articleUrl = $_POST["articleUrl"];
            $articleContent = $_POST["articleContent"];
            $articleImage = $_POST["articleImage"];
            $articleMetaTitle = $_POST["articleMetaTitle"];
            $articleMetaDesc = $_POST["articleMetaDescription"];
            $articleMetaKeywords = $_POST["articleMetaKeywords"];
            $articleStatus = $_POST["articleStatus"];
            $articleCategory = $_POST["articleCategory"];
            $articleCreatedBy = $_POST["articleCreatedBy"];

            if($articleName != null){

            $articleData = array(
                'articleName' => $articleName,
                'articleTitle' => $articleTitle,
                'articleUrl' => $articleUrl,
                'articleContent' => $articleContent,
                'articleMetaTitle' => $articleMetaTitle,
                'articleMetaKeywords' => $articleMetaKeywords,
                'articleMetaDescription' => $articleMetaDesc,
                'articleStatus' => $articleStatus,
                'articleCreatedBy' => $articleCreatedBy,
                'articleImage' => $articleImage,
                'categoryId' => $articleCategory
            );

         

            $where = array('articleId' => $articleId);
            $this->_articles->updateArticle($articleData, $where);
            Session::set('message', '<div class="message message_success"><h6 class="white lowecase">Success!</h6> <p>The <span class="bold">' . $articleName .'</span> article was updated successfully.</p></div>');
            Url::redirect('qadmin/articles/edit/' . $articleId);
            } else {
              $error[] = '<h3 class="white">Error!</h3><p>Your request cannot be processed. You must have a Article Name, Title, and Url to create a web article.</p>';
            }

        }
        

        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/articles/edit', $data, $error);
        View::renderTemplate('footer', $data, 'admin');

    }


      

    public function deleteArticle($articleId)
    {
      $this->_articles->deletearticle($articleId);
      Url::redirect('qadmin/articles');
      Session::set('message', 'Article Deleted');
    }


}
