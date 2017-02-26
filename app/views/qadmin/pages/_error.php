<?php use \Core\Error;

 if($error) {

    echo('<div class="toast toast_danger"><div class="toast-close"><i class="material-icons">close</i></div>' .  Error::display($error) . '</div>');
    

 } 
 
 ?>

 <script>
 $(document).ready(function(){

     setTimeout(function(){
         $('.toast').fadeOut().remove();
     }, 10000);

 });
 
 </script>