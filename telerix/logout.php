<?php
session_start();
/* Lösche die Session */
session_destroy();

/* Zeige die index.php */
include('index.php');
?>
