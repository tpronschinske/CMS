<?php

use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;

//initialise hooks
$hooks = Hooks::get();



Assets::css([
    Url::templatePath().'css/jewels.css',
    Url::templatePath().'css/style.css',
]);

//hook for plugging in css
$hooks->run('css');

?>
<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,200,300,400,500" rel="stylesheet">