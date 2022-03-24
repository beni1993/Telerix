<?php
$stream = $_POST["inetstream"];
require('checklogin.php');

/*Stream von allen Sonderzeichen bereinigen*/
/* Erlaubt: A-Z a-z 0-9 . : / -  */
$stream = preg_replace ( '/[^a-z0-9.:\/\-_]/i', '', $stream );
system("./set_stream.sh $stream");
system("./asterisk_restart.sh");

header('Location: configuration.php')
?>
