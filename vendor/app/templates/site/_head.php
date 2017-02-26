<?php

use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;

//initialise hooks
$hooks = Hooks::get();



Assets::css([
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
    Url::templatePath().'css/style.css',
]);

//hook for plugging in css
$hooks->run('css');

?>