<?php namespace Controllers;

use \Core\View;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Paginator;
use \Helpers\Url;
use Helpers\AjaxHandler as Ajax;

class AdminPagesController extends Controller {

    private $_pages;
    private $_menu;

    public function __construct() {

      if(!Session::get(loggedin)){

        Url::redirect('login');

      }

        $this->_pages = new \Models\Pages();
        $this->_menu = new \Models\Menu();

    }


    public function index()
    {
        $data['title'] = 'CMS';
        $data['welcome_message'] = 'Page';

        $pageData = new \Helpers\Paginator('5', 'pages_data');
        $data['pages_data'] = $this->_pages->getAllPagesPaged($pageData->getLimit());
        $pageData->setTotal( $data['pages_data'][0]->total );
        $data['pageLinks'] = $pageData->pageLinks();
		

        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/pages/index', $data);
        View::renderTemplate('footer', $data, 'admin');
    }



    public function createPage()
    {

        $data['title'] = 'CMS';
        $data['welcome_message'] = 'Pages';
        $data['pagesUrlData'] = $this->_pages->getAllPages();
        $data['menus'] = $this->_menu->getAllMenus();

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          AdminPagesController::postPageData();

         }

        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/pages/add', $data, $error);
        View::renderTemplate('footer', $data, 'admin');
    }

    public function editPage($pageId) {

        $data['title'] = "Edit Page";
        $data['pageData'] = $this->_pages->getPageById($pageId);
        $data['pagesUrlData'] = $this->_pages->getAllPages();
        $data['menus'] = $this->_menu->getAllMenus();
        $pageUrlForMenuItems = $this->_pages->getPageUrlById($pageId);
        $data['menuItemsChecked'] = $this->_menu->getAllMenuItemsInMenuByUrl($pageUrlForMenuItems);

    		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          AdminPagesController::updatePageData($pageId);

        }

            View::renderTemplate('header', $data, 'admin');
            View::render('qadmin/pages/edit', $data, $error);
            View::renderTemplate('footer', $data, 'admin');

        }


      

    public function deletePage($pageId)
    {
      $this->_pages->deletePage($pageId);
      Url::redirect('qadmin/pages');
      Session::set('message', 'Page Deleted');
    }



     function updatePageData($pageId){
           if($pageId == 1) {

                $pageUrl = "";

              } else {

                $pageUrl = $_POST['pageUrl'];

              }

                $pageName = $_POST['pageName'];
                $parentPage = $_POST['pageParent'];

                 if($parentPage != 0){

                    $fullPageUrl = $this->_pages->getPageParentUrl($parentPage);
                    $completeUrl = $fullPageUrl . '/' . $pageUrl;

                  } else {

                      $completeUrl = $pageUrl;

                  }

                $pageHeadline = $_POST['pageName'];
                $pageUrl = $_POST['pageUrl'];
                $pageContent = $_POST['pageContent'];
                $pageMetaTitle = $_POST['pageMetaTitle'];
                $pageMetaKeywords = $_POST['pageMetaKeyword'];
                $pageMetaDescription = $_POST['pageMetaDesc'];
                $pageStatus = $_POST['pageStatus'];
                $pageCreatedBy = $_POST['pageCreatedBy'];
                $pageBannerImg = $_POST['pageBannerImg'];

                if($pageCreatedBy == 'admin'){
                  $pageCreatedBy = "Administrator";
                }


              if($pageName != null){

                $pageData = array(
        					'pageName' => $pageName,
                  'pageParent' => $parentPage,
                  'pageTitle' => $pageHeadline,
                  'pageUrl' => $completeUrl,
                  'pageContent' => $pageContent,
                  'pageMetaTitle' => $pageMetaTitle,
                  'pageMetaKeyword' => $pageMetaKeywords,
                  'pageMetaDesc' => $pageMetaDescription,
                  'pageStatus' => $pageStatus,
                  'pageCreatedBy' => $pageCreatedBy,
                  'pageBannerImg' => $pageBannerImg
        				);

              //-- completes adding item to menus
              if($parentPage != 0){
                $parentId = $this->_menu->getMainMenuItemIdByUrl($fullPageUrl);
              } else {
                $parentId = 0;
              }
              $updatedUrl = '/' . $completeUrl;


              $pageUrlForMenuItems = $this->_pages->getPageUrlById($pageId);
              $data['menuItems'] = $this->_menu->getAllMenuItemsInMenuByUrl($pageUrlForMenuItems);
              $menus = $_POST["menus"];
              $menuCount = sizeof($menus);
              
              for ($x = 0; $x <= $menuCount; $x++) {

                if($menus[$x] == $data['menuItems'][$x]->menuKey){

                } else {

                  if($menus[$x] != null){
                    $menuData = array(
                        'menuItemName' => $pageHeadline,
                        'menuItemLink' => $updatedUrl,
                        'menuParent' => $parentId,
                        'menuKey' => $menus[$x]
                    );
                    $this->_menu->createMenuItem($menuData);
                  }

                }
              }

    					$where = array('pageId' => $pageId);
    					$this->_pages->updatePage($pageData, $where);
              Session::set('message', '<div class="message message_success"><h6 class="white lowecase">Success!</h6> <p>The <span class="bold">' . $pageName .'</span> page was updated successfully.</p></div>');
              Url::redirect('qadmin/pages/edit/' . $pageId);

            } else {
              $error[] = '<h3 class="white">Error!</h3><p>Your request cannot be processed. You must have a Page Name and Page Url to create a webpage.</p>';
            }
     }


    function postPageData(){
             

          $pageName = $_POST['pageName'];
          $parentPage = $_POST['pageParent'];
          $pageHeadline = $_POST['pageName'];
          $pageUrl = $_POST['pageUrl'];
          $pageContent = $_POST['pageContent'];
          $pageMetaTitle = $_POST['pageMetaTitle'];
          $pageMetaKeywords = $_POST['pageMetaKeyword'];
          $pageMetaDescription = $_POST['pageMetaDesc'];
          $pageStatus = $_POST['pageStatus'];
          $pageCreatedBy = $_POST['pageCreatedBy'];
          $pageBannerImg = $_POST['pageBannerImg'];

          if($pageCreatedBy == 'admin'){
            $pageCreatedBy = "Administrator";
          }

          if($parentPage != 0){

              $fullPageUrl = $this->_pages->getPageParentUrl($parentPage);
              $completeUrl = $fullPageUrl . '/' . $pageUrl;

            } else {

                $completeUrl = $pageUrl;

            }

          if($pageName != null){

            $pageData = array(
              'pageName' => $pageName,
              'pageParent' => $parentPage,
              'pageTitle' => $pageHeadline,
              'pageUrl' => $completeUrl,
              'pageContent' => $pageContent,
              'pageMetaTitle' => $pageMetaTitle,
              'pageMetaKeyword' => $pageMetaKeywords,
              'pageMetaDesc' => $pageMetaDescription,
              'pageStatus' => $pageStatus,
              'pageCreatedBy' => $pageCreatedBy,
              'pageBannerImg' => $pageBannerImg,
            );

            $menus = $_POST["menus"];
            $menuCount = sizeof($menus);
            if($parentPage != 0){
                $parentId = $this->_menu->getMainMenuItemIdByUrl($fullPageUrl);
            } else {
              $parentId = 0;
            }
            $updatedUrl = '/' . $completeUrl;
              
              for ($x = 0; $x <= $menuCount; $x++) {

                if($menus[$x] == $data['menuItems'][$x]->menuKey){

                } else {

                  if($menus[$x] != null){
                    $menuData = array(
                        'menuItemName' => $pageHeadline,
                        'menuItemLink' => $updatedUrl,
                        'menuParent' => $parentId,
                        'menuKey' => $menus[$x]
                    );
                    $this->_menu->createMenuItem($menuData);
                  }

                }
              }

            $this->_pages->createPage($pageData);
            Session::set('message', '<div class="message message_success"><h6 class="white lowecase">Success!</h6> <p>The <span class="bold">' . $pageName .'</span> page was created successfully.</p></div>');
            Url::redirect('qadmin/pages');
          } else {
            $error[] = '<h3 class="white">Error!</h3><p>Your request cannot be processed. You must have a Page Name and Page Url to create a webpage.</p>';
          }

          

        }
}
