<?php

namespace Controllers;

use \Core\View;
use \Core\Error;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;
use \Helpers\Paginator;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class CategoriesController extends Controller
{

    private $_article;
    private $_category;
  
    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->_article = new \Models\Articles();
        $this->_category = new \Models\Categories();
  
    }

    /**
     * Define Index page title and load template files
     */
    public function index($catUrl)
    {
        $catId = $this->_category->getCategoryIdByUrl($catUrl);
        $data['article_data'] = $this->_article->getArticlesByCategory($catId);

        if($data['article_data']){
          $data['title'] = $data['article_data'][0]->articleTitle;
        }

       if($data['article_data'] == null || empty($data['article_data'])){
           View::renderTemplate('header', $data);
           View::render('error/404', $data);
           View::renderTemplate('footer', $data);
       } else {
         $categoryTemplateUrl = strtolower(rtrim($catUrl, '/\\'));
         $customTemplate =  'categories/' . $categoryTemplateUrl;
         View::renderTemplate('header', $data);

         if(!file_exists(SMVC."app/views/". $customTemplate . ".php")){ //ONLY CHANGE HERE
            View::render('categories/category', $data);
         } else {
            View::render($customTemplate, $data); //LEAVE $customTemplate AS IS
         }
         View::renderTemplate('footer', $data);
       }// end of else

    }

    public function categoryList(){

        $categoryData = new \Helpers\Paginator('6', 'category_data');
        $data['category_data'] = $this->_category->getAllCategoriesPaged($categoryData->getLimit());
        $categoryData->setTotal( $data['category_data'][0]->total );
        $data['pageLinks'] = $categoryData->pageLinks();

        View::renderTemplate('header', $data);
        View::render('categories/index', $data);
        View::renderTemplate('footer', $data);

    }


}
