<?php
   require('checklogin.php');
   $a = system("./hangup_all.sh");
   header('Location: start.php');
?>
