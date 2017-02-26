<?php

use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;

//initialise hooks
$hooks = Hooks::get();

Assets::css([
    Url::adminTemplatePath().'css/jewels.css',
    Url::adminTemplatePath().'css/fix.css',
    Url::adminTemplatePath().'css/style.css'
]);

//hook for plugging in css
$hooks->run('css');

?>
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">