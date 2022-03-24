<?php
require('checklogin.php');
$sip_id = $_POST["sip_id"];
$sip_password = $_POST["sip_pw"];
$sip_registrar = $_POST["sip_reg"];

/* Testausgabe
echo "ID: $sip_id";
echo "PW: $sip_password";
echo "RE: $sip_registrar";
*/

/*SIP-ID von allen unerlaubten Zeichen bereinigen*/
/* Erlaubt: A-Z a-z 0-9 . : / -            */
$sip_id = preg_replace ( '/[^a-z0-9.:\/\-_]/i', '', $sip_id);

/*SIP-Passwort von allen unerlaubten Zeichen bereinigen!*/
/* Erlaubt: A-Z a-z 0-9 . : / -            */
$sip_password = preg_replace ( '/[^a-z0-9.:\/\-_]/i', '', $sip_password);

/*SIP-Registrar von allen Sonderzeichen bereinigen*/
/* Erlaubt: A-Z a-z 0-9 . : / -            */
$sip_registrar = preg_replace ( '/[^a-z0-9.:\/\-_]/i', '', $sip_registrar);

system("./set_sipconfig.sh $sip_id $sip_password $sip_registrar");
system("./asterisk_restart.sh");

header('Location: configuration.php');
?>
