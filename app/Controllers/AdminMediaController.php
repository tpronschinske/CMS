<?php namespace Controllers;

use \Core\View;
use \Core\Error;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

class AdminMediaController extends \Core\Controller
{



    public function __construct(){}

    public function index()
    {
        $data['title'] = "Media";


        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/media/index', $data);
        View::renderTemplate('footer', $data, 'admin');
        

    }

}