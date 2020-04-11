<?php
   session_start();
   if($_SESSION['status'] != "logged in")
   {
      session_destroy();
      include('index.php');
      exit();
   }

   // Timeout auf 4 Stunden einstellen 
   $timeout=14400;

   // Wenn es der erste Aufruf nach dem Log-In ist, Zeit merken
   if (!isset($_SESSION['visit_time']))
   {
      $_SESSION['visit_time'] = time();
   }

   // Wenn der letzte Seitenaufruf zu lange her ist, neu Anmeldung fordern
   if( (time() - $_SESSION['visit_time']) > $timeout )
   {
      unset($_SESSION['status']);
      session_destroy();
      include('index.php');
      exit();
   }

   // Letzten Seitenaufruf auf jetzige Zeit aktualisieren
   $_SESSION['visit_time']=time();

?>
