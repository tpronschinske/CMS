(function(root, factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        module.exports = factory(require('jquery'));
    } else {
        root.jewels = root.jewels || {};
        root.jewels.popover = factory(root.jQuery);
    }
}(this, function($) {
    'use strict';

    function initializePopover() {
        $(function() {
            $('.popover--link').click(function() {
                var popover = $('.popover');
                var popoverMessage = $(this).find('.popover--message');
                popoverMessage.toggleClass('show-popover');

                setTimeout(function() {
                    popoverMessage.toggleClass('popover-fade');
                }, 200);

                var popoverHeight, verticalTop;

                if (popoverMessage.hasClass('popover--message--left')) {
                    popoverHeight = popoverMessage.height();
                    verticalTop = -Math.abs(popoverHeight / 2);
                    popoverMessage.css('top', verticalTop);
                }

                if (popoverMessage.hasClass('popover--message--right')) {
                    popoverHeight = popoverMessage.height();
                    verticalTop = -Math.abs(popoverHeight / 2);
                    popoverMessage.css('top', verticalTop);
                }

                if (popoverMessage.hasClass('popover--message--top')) {
                    popoverHeight = popoverMessage.height();
                    console.log(popoverHeight);
                    verticalTop = popoverHeight + 30;
                    popoverMessage.css('top', -verticalTop);
                }

            });

        });
    }

    window.addEventListener('load', function() {
        initializePopover();
    });
    return {
        initializePopover: initializePopover
    };

}));