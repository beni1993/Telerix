<?php
   require('checklogin.php');
   $a = system('./asterisk_restart.sh');
   header('Location: start.php');
?>

