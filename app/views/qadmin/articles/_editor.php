
<script src="/app/Modules/tinymce/js/tinymce/tinymce.min.js"></script>
<script>

    $('#add-img').click(function(){

        $.easyModal({
             content: '<iframe width="100%" height="650" frameborder="0" src="/app/Modules/filemanager/dialog.php?field_id=bannerImage&type=0&akey=a184527g5KxUxsMapQW48"></iframe>',
             size: 'xlarge',
             fadeInModal: 200,
             fadeOutModal: 200,
             footer: true,
             buttonText: "Ok",
             linkText: "Cancel",
             buttonId: "bannerButton"
        });

    });

    tinymce.init({ 
        mode : "specific_textareas",
        editor_selector : "article-content",
        theme: "modern",
         plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        height: '380px',
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",

        external_filemanager_path:"/app/Modules/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        filemanager_access_key: "a184527g5KxUxsMapQW48" ,
        external_plugins: { "filemanager" : "/app/Modules/filemanager/plugin.min.js" }
    });

    responsive_filemanager_callback(bannerImage);

    function responsive_filemanager_callback(fieldId){
        var url = jQuery('#' + fieldId).val();
        $('.newBanner').attr("src", url);
    }


</script>