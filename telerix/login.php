<?php
   include('userdata.php');
   $username=$_POST['tuser'];
   $password=$_POST['tpass'];
   //echo password_hash($password,PASSWORD_DEFAULT); Funktion um ein Passwort zu erstellen

   if($username != $requser)
   {
      include('index.php');
      exit();
   }
   //$reqpass='$2y$10$ECffelL3xKhlV.35g/K62ucl8uYCTc5GiQ2RWwDuhi/2Sk3AZx1pe';

   if(password_verify($password, $reqpass)) {
      /* User ist authentifiziert - Starte Session*/
      session_start();
      $_SESSION['status'] = "logged in";
      include('start.php');
   }
   else
   {
      include('index.php');
   }
?>
