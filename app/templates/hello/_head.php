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

Assets::js([
    Url::templatePath().'js/jquery.js'
]);

//hook for plugging in css
$hooks->run('css');



?>

<script>
$(document).ready(function () {
    $('#menu-1 li').hover(
        function () {
            $('ul', this).stop(true).slideToggle(200);
        },
        function () {
            $('ul', this).stop(true).slideToggle(200);
        }
    );
});
</script>