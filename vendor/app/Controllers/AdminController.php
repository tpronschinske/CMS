<?php namespace Controllers;

use Core\View;
use Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

class AdminController extends Controller {

    public function __construct() {

        if(!Session::get(loggedin)){
          Url::redirect('login');
        }

    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
        $data['title'] = 'CMS';
        $data['welcome_message'] = 'Dashboard Page';

        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/index', $data);
        View::renderTemplate('footer', $data, 'admin');
    }




}
