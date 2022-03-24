<?php
   require('checklogin.php');
   $a = system('sudo shutdown now -f -h -P');
   header('Location: start.php');
?>
