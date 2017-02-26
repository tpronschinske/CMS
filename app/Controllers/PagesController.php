<?php namespace Controllers;

use \Core\View;
use \Core\Error;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

class PagesController extends \Core\Controller
{

    private $_pages;
    

    public function __construct()
    {
        $this->_pages = new \Models\Pages();
       
    }

    public function index()
    {
        $data['title'] = "Home";
        $data['home_page'] =  $this->_pages->getHomePage();

         if($data['home_page']){

           foreach ($data['home_page'] as $row) {

             $data['title'] = $row->pageMetaTitle;
             $data['status'] = $row->pageStatus;
             $data['metaDescription'] = $row->pageMetaDesc;
             $data['metaKeyword'] = $row->pageMetaKeyword;

           } 

         }


        if($data['home_page'] == null || empty($data['home_page'])){

          View::renderTemplate('header', $data);
          View::render('error/404', $data);
          View::renderTemplate('footer', $data);

        } else {

          View::renderTemplate('header', $data);
          View::render('pages/home-page', $data);
          View::renderTemplate('footer', $data);
          
        }

    }


    public function pages($pageUrl)  {

        $data['page'] = $this->_pages->getPage($pageUrl);

         if($data['page']){

           foreach ($data['page'] as $row) {

             $data['title'] = $row->pageMetaTitle;
             $data['status'] = $row->pageStatus;
             $data['metaDescription'] = $row->pageMetaDesc;
             $data['metaKeyword'] = $row->pageMetaKeyword;

           } 

         }



        if($data['page'] == null || $data['status'] == 0){

            View::renderTemplate('header', $data);
            View::render('error/404', $data);
            View::renderTemplate('footer', $data);

        } else {

          $pageTemplateUrl = strtolower(rtrim($pageUrl, '/\\'));
          $customTemplate =  'pages/' . $pageTemplateUrl;
          View::renderTemplate('header', $data);

          if(!file_exists(SMVC."app/views/". $customTemplate . ".php")){

             View::render('pages/page', $data);

          } else {

             View::render($customTemplate, $data); 

          }

          View::renderTemplate('footer', $data);

        }
    } 


}
