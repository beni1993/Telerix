<?php
   require('checklogin.php');
   $a = system('./asterisk_service_restart.sh');
   include 'start.php';
?>

