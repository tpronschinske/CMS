$(document).ready(function() {

    $('.toast').on('click', function() {
        $(this).remove();
    });

    $('.main_nav_item').click(function() {
        var subMenu = $(this).find('.main_nav_sub');
        subMenu.slideToggle();
    });

});