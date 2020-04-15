<?php
   require('checklogin.php');
   include('userdata.php');

   $oldpass = $_POST['telerix_old_pw'];

   if(password_verify($oldpass, $reqpass))
   {
      unlink('nopassword.php');
      /* User ist authentifiziert*/
      if( $_POST['telerix_new_pw_a'] == $_POST['telerix_new_pw_b'])
      {
         /* Passwort eintragen */
         $datei = fopen("userdata.php","w+");
         $inputtxt = '<?php';
         $inputtxt = "$inputtxt" . "\n" . '$requser=\'' . $_POST['telerix_user'] . '\';' . "\n";
         $inputtxt = "$inputtxt" . '$reqpass=\'' . password_hash($_POST['telerix_new_pw_b'],PASSWORD_DEFAULT) . '\';';
         $inputtxt = "$inputtxt" . "\n" . '?>';
         fwrite($datei, $inputtxt);
         rewind($datei);
         fclose($datei);
      }

   }

   //Zeige Seite
   include('configuration.php');
?>
