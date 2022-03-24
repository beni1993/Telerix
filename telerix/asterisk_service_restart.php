<?php
   require('checklogin.php');
   $a = system('./asterisk_service_restart.sh');
   header('Location: start.php');
?>

