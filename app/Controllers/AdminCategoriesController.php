<?php namespace Controllers;

use \Core\View;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;


class AdminCategoriesController extends Controller
{
    private $_category;


    public function __construct()
    {
      if(!Session::get(loggedin)){
        Url::redirect('login');
      }

      $this->_category = new \Models\Categories();

    }


    public function index()
    {

        $data['title'] = 'CMS';

        $data['category_data'] = $this->_category->getAllCategories();

        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/categories/index', $data);
        View::renderTemplate('footer', $data, 'admin');
    }
}