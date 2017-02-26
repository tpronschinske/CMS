<!-- Site meta -->
<meta charset="utf-8">

<?php

use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;
use Helpers\Session;

?>

<link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php
// user info from login
$user = Session::get('user');

//initialise hooks
$hooks = Hooks::get();


Assets::css([
    Url::adminTemplatePath().'css/jewels.css',
    Url::adminTemplatePath().'css/fix.css',
    Url::adminTemplatePath().'css/style.css',
    Url::adminTemplatePath().'js/jquery-modal/dist/modal.css',
    Url::adminTemplatePath().'js/jquery-popover/dist/jewels-popover.css'
]);

Assets::js([
    Url::adminTemplatePath().'js/jquery/dist/jquery.min.js',
    Url::adminTemplatePath().'js/jquery-validate/dist/jquery.validate.js',
    Url::adminTemplatePath().'js/jquery-modal/dist/jewels-jquery-modal.js',
    Url::adminTemplatePath().'js/jquery-popover/dist/jewels-jquery-popover.js',
    Url::adminTemplatePath().'js/scripts.js'
]);
//hook for plugging in css
$hooks->run('css');

?>
<script>
 $(window).on('load', function(){
     $('.loading').css('display', 'none');

 });   

$(function(){
    $('.sub-nav-dropdown').click(function(){
       
    });
});
</script>