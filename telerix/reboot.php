<?php
   require('checklogin.php');
   $a = system('sudo shutdown now --reboot');
   header('Location: start.php');
?>

