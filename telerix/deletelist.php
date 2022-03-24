<?php
   require('checklogin.php');
   $a = system("rm ./uploads/*");
   header('Location: settings.php');
?>
