<?php
   require('checklogin.php');
   include('./layout/navbar.php');
?>

<div class="w3-container w3-padding-32" style="background-color: #d4e1ff">

  <div class="w3-content" style="max-width:980px"><!-- Wrapper start -->

 <!-- Internetstream Konfiguration Panel Begin-->
 <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">Internetstream:</h3>

  <?php
  include("streamconfigpanel.php");
  ?>

  <br />
  <br/>
 </div>
  <!-- Internetstream Konfiguration Panel End-->

 <!-- SIP - Konfiguration Begin-->
 <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">SIP-Konfiguration:</h3>
  <?php
  include("sipconfigurationpanel.php");
  ?>

  <br />
  <br/>
 </div>
  <!-- SIP - Konfiguration End-->

  <!-- Zugangsdaten - Konfiguration Begin-->
  <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">Zugangsdaten &auml;ndern:</h3>
  <?php
  include("changepass.php");
  ?>

  <br />
  <br/>
  </div>
  <!-- Zugangsdaten - Konfiguration End-->



 </div> 

  </div>
</div>

<?php
   include('./layout/footer.php');
?>
