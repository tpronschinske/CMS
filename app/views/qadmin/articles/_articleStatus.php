
<?php 
if($row->articleStatus == 1){
    echo('<span class="published">Published</span>');
} else {
    echo('<span class="draft">Draft</span>');
}
?>