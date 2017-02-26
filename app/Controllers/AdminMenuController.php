<?php namespace Controllers;

use \Core\View;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;


class AdminMenuController extends Controller
{

    private $_menu;
    private $_pages;


    public function __construct()
    {
      if(!Session::get(loggedin)){
        Url::redirect('login');
      }

      $this->_menu = new \Models\Menu();
      $this->_pages = new \Models\Pages();

    }


    public function index()
    {

        $data['title'] = 'CMS';

        $data['menu'] = $this->_menu->getAllMenus();

        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/menu/index', $data);
        View::renderTemplate('footer', $data, 'admin');
    }

    public function createMenu()
    {
        $data['title'] = 'CMS';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $menuName = $_POST['menuName'];
          $lastMenuKey = $this->_menu->getLastMenuKey();
          $newMenuKey = $lastMenuKey + 1;


          $menuData = array(
            'menuName' => $menuName,
            'menuKey' => $newMenuKey
          );

          $this->_menu->createMenu($menuData);
          Url::redirect('qadmin/menu/edit/' . $newMenuKey);
        }

        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/menu/add', $data);
        View::renderTemplate('footer', $data, 'admin');
    }

    public function editMenu($menuId)
    {
        $data['title'] = 'CMS';

        $data['pageLinks'] = $this->_pages->getAllPages();
        $data['menuItems'] = $this->_menu->getMainMenuItems($menuId);
        $data['menu'] = $this->_menu->getMenuById($menuId);
        Session::set('menuId', $menuId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $menuKey = $menuId;
            $page = $_POST['addPage'];
            $pageParent = $_POST['parentItem'];

            if($pageParent == 1){
                $pageParent = 0;
            }

            $menuItemName = $_POST['menuItemName'];
            $menuLinkTitle = $_POST['menuItemLinkTitle'];

            $pageUrl = '/' . $this->_pages->getPageUrlById($page);

            $menuData = array(
              'menuItemName' => $menuItemName,
              'menuItemLink' => $pageUrl,
              'menuKey' => $menuId,
              'menuItemLinkTitle' => $menuLinkTitle,
              'menuParent' => $pageParent

            );

            $this->_menu->createMenuItem($menuData);
            Session::set('message', '<div class="message message_success"><h6 class="white lowecase">Success!</h6> <p>Your menu item was added successfully.</p></div>');
            Url::redirect('qadmin/menu/edit/' . $menuId);


        }


        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/menu/edit', $data);
        View::renderTemplate('footer', $data, 'admin');
    }

    public function deleteMenuItem($menuItemId)
    {
      $menuEdited = Session::get(menuId);
      $this->_menu->deleteMenuItem($menuItemId);
      Url::redirect('qadmin/menu/edit/' . $menuEdited);
      Session::set('message', 'Menu Item Deleted');

    }

    public function deleteMenu($mainMenuId)
    {
        $data['title'] = 'CMS';


        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/menu/delete', $data);
        View::renderTemplate('footer', $data, 'admin');
    }



}
