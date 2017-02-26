<?php namespace Controllers;

use \Core\View;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Paginator;
use \Helpers\Url;

class AdminSettingsController extends Controller {

    private $_settings;

    public function __construct() {

      if(!Session::get(loggedin)){

        Url::redirect('login');

      }

      $this->_settings = new \Models\Settings();

    }


    public function siteSettings()
    {
        $data['title'] = 'CMS';
        $data['welcome_message'] = 'Settings';
        $data['settingsData'] = $this->_settings->getSettings();

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $siteName = $_POST['siteName'];
          $siteLogo = $_POST['siteLogo'];
          $siteUrl = $_POST['siteAddress'];
          $siteEmail = $_POST['siteEmail'];
          $siteLanguage = $_POST['siteLanguage'];
          $siteLocation = $_POST['siteLocation'];

          $settingData = array(
            'siteName' => $siteName,
            'siteLogo' => $siteLogo,
            'siteAddress' => $siteUrl,
            'siteEmail' => $siteEmail,
            'siteLanguage' => $siteLanguage,
            'siteLocation' => $siteLocation
          );

         	$where = array('siteSettingId' => 1);
          $this->_settings->updateSettings($settingData, $where);
          Session::set('message', '<div class="toast toast_success"><h6 class="white lowecase">Success!</h6> <p>Your settings were updated successfully.</p></div>');
          Url::redirect('qadmin/site-settings');
        }



        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/settings/index', $data);
        View::renderTemplate('footer', $data, 'admin');
    }

    public function themeSettings()
    {
        $data['title'] = 'CMS';
        $data['welcome_message'] = 'Settings';
        $data['settingsData'] = $this->_settings->getSettings();

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $siteTheme = $_POST['siteTheme'];
          $siteAdminTheme = $_POST['siteAdminTheme'];

          $settingData = array(
            'siteTheme' => $siteTheme,
            'siteAdminTheme' => $siteAdminTheme
          );

         	$where = array('siteSettingId' => 1);
          $this->_settings->updateSettings($settingData, $where);
          Session::set('message', '<div class="toast toast_success"><h6 class="white lowecase">Success!</h6> <p>Your settings were updated successfully.</p></div>');
          Url::redirect('qadmin/theme-settings');
        }



        View::renderTemplate('header', $data, 'admin');
        View::render('qadmin/settings/theme-settings', $data);
        View::renderTemplate('footer', $data, 'admin');
    }




}
