<script>
     $('#change-img').click(function(){

        $.easyModal({
             content: '<iframe width="100%" height="650" frameborder="0" src="/app/Modules/filemanager/dialog.php?field_id=siteLogo&type=0&akey=a184527g5KxUxsMapQW48"></iframe>',
             size: 'xlarge',
             fadeInModal: 200,
             fadeOutModal: 200,
             footer: true,
             buttonText: "Ok",
             linkText: "Cancel",
             buttonId: "bannerButton"
        });

    });

    responsive_filemanager_callback(siteLogo);

    function responsive_filemanager_callback(fieldId){
        var url = jQuery('#' + fieldId).val();
        $('.site-logo').attr("src", url);
    }

</script>
