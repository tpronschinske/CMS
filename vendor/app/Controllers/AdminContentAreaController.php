<?php namespace Controllers;

use \Core\View;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Paginator;
use \Helpers\Url;


class AdminContentAreaController extends Controller {

    private $_contentArea;

    public function __construct() {

      if(!Session::get(loggedin)){

        Url::redirect('login');

      }

      $this->_contentArea = new \Models\ContentArea();
    }


    public function index() {

        $data['title'] = 'CMS';
        $data['contentAreas'] = $this->_contentArea->getContentAreas();


        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/content-area/index', $data);
        View::renderTemplate('footer', $data, 'admin');
    }

     public function deleteContentArea($contentAreaId)
    {
   
      $this->_contentArea->deleteContentArea($contentAreaId);
      Url::redirect('qadmin/content-area');
      Session::set('message', 'Menu Item Deleted');

    }

}

?>