(function($) {
    /*jshint multistr: true */
    var defaultSettings = {
        content: '<p>New Easy Modal/Dialog Box</p>',
        size: 'medium',
        fadeInModal: 200,
        fadeOutModal: 200,
        footer: false,
        buttonText: "Ok",
        linkText: "Cancel",
        buttonId: "",
    };

    $.easyModal = function(options) {

        var o = $.extend({}, defaultSettings, options),
            $wrap = $('<div class="modal_wrap">').hide(); //Modal Wrapper

        if (o.footer) {
            // Modal with footer and action buttons
            $easyModal = $('<div id="offClick" class="modal_bg">\
                           <div class="modal modal_' + o.size + '"><div class="modal_content">' + o.content + '</div>\
                           <div class="modal_footer">\
                           <div class="modal_actions"> \
                           <button class="button button_link close">' + o.linkText + '</button>\
                           <button id="' + o.buttonId + '" class="button button_site_color close">' + o.buttonText + '</button>\
                           </div>\
                           </div>\
                           </div>\
                           </div>').hide(); // MAIN MODAL STRUCTURE WITH FOOTER

        } else {
            // Modal with close icon in upper corner
            $easyModal = $('<div class="modal_bg close">\
                           <div class="modal modal_' + o.size + '"><span id="modal_close" class="modal_close close"><i class="material-icons">close</i></span>\
                           <div class="modal_content">' + o.content + '</div></div>').hide(); // MAIN MODAL STRUCTURE NO FOOTER
        }

        // action called on click for show function
        function show() {

            var top, left;

            $wrap.fadeIn(o.fadeInModal, function() {
                $easyModal.fadeIn(o.fadeInModal);
            });

            top = Math.max($(window).height() - $easyModal.outerHeight(), 0) / 2;
            left = Math.max($(window).width() - $easyModal.outerWidth(), 0) / 2;

            $easyModal.css({
                top: top + $(window).scrollTop(),
                left: left + $(window).scrollLeft()
            });
        }

        // Hiding the Modal
        function hide() {
            $easyModal.fadeOut(o.fadeOutModal, function() {
                $wrap.fadeOut(o.fadeOutModal).remove();
            });
        }

        $easyModal.find('.close').on('click', function(e) {
            hide();
        });

        $('body').prepend($wrap.append($easyModal));
        show();
    };

}(jQuery));