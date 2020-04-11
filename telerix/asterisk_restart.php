<?php
   require('checklogin.php');
   $a = system('./asterisk_restart.sh');
   include 'start.php';
?>

