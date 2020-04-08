<!DOCTYPE html>
<html lang="de">
<head>
<title>TELERIX</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:30px}
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function togglemenu() {
  var x = document.getElementById("navsmall");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</head>
<body bgcolor="#d4e1ff">
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-blue w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="togglemenu()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-light-blue">TELERIX</a>
    <a href="settings.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Nummerverwaltung</a>
    <a href="configuration.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Konfiguration</a>
    <a href="help.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Hilfe</a>
    <a href="info.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Info</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navsmall" class="w3-bar-block w3-hide w3-white w3-hide-large w3-hide-medium w3-large">
    <a href="settings.php" class="w3-bar-item w3-button w3-padding-large">Nummerverwaltung</a>
    <a href="configuration.php" class="w3-bar-item w3-button w3-padding-large">Konfiguration</a>
    <a href="help.php" class="w3-bar-item w3-button w3-padding-large">Hilfe</a>
    <a href="info.php" class="w3-bar-item w3-button w3-padding-large">Info</a>
  </div>




</div> 
 <!-- Navbar Background -->
<div>
  <div class="w3-bar w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.html" class="w3-bar-item w3-button w3-padding-large" style="color:#d4e1ff">TELERIX</a>

    <a href="impressum.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="color:#d4e1ff">>Nummerverwaltung</a>
    <a href="impressum.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="color:#d4e1ff">Konfiguration</a>
    <a href="impressum.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="color:#d4e1ff">Hilfe</a>
    <a href="impressum.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="color:#d4e1ff">Info</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="impressum.html" class="w3-bar-item w3-button w3-padding-large">Impressum</a>
  </div>
</div>
