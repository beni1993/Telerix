<?php
   require('checklogin.php');
   include('./layout/navbar.php');
?>
<div class="w3-container w3-padding-32" style="background-color: #d4e1ff">
  <div class="w3-content" style="max-width:980px">

  <!-- Optionen Panel Begin-->
  <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">Optionen</h3>
  <!-- Buttonbar begin -->
  <div class="w3-bar">
  <a href="hangup_all.php" onclick="if(!confirm('Alle Anrufer auflegen?')) return false;"
     <button class="w3-button w3-dark-gray w3-round" style="margin-bottom: 5px">Alle Anrufer auflegen</button>
  </a>
  <a href="asterisk_restart.php" onclick="if(!confirm('Asterisk neu starten? Alle bestehenden Verbindungen werden damit unterbrochen.')) return false;"
     <button class="w3-button w3-dark-gray w3-round w3-padding" style="margin-bottom: 5px">Asterisk neu starten</button>
  </a>
   <a href="asterisk_service_restart.php" onclick="if(!confirm('Asterisk Service neu starten? Alle bestehenden Verbindungen werden damit unterbrochen.')) return false;"
     <button class="w3-button w3-dark-gray w3-round" style="margin-bottom: 5px">Asterisk Service neu starten</button>
  </a>
  <a href="reboot.php"onclick="if(!confirm('Server neustarten?')) return false;"
     <button class="w3-button w3-dark-gray w3-round" style="margin-bottom: 5px">Anlage neu starten</button>
  </a>
  <a href="shutdown.php" onclick="if(!confirm('Server herunterfahren?')) return false;"
     <button class="w3-button w3-dark-gray w3-round" style="margin-bottom: 5px">Anlage herunterfahren</button>
  </a>
  </div>
  <br />
  <br/>
 </div>
  <!-- Optionen Panel End-->

  <!-- Streamübersichtkasten begin -->
  <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">Internetradiostreams</h3>
  <!-- Streamliste begin -->
  <ul class="w3-ul w3-center">
  <?php
    $out=system("./show_internetstreams.sh");
  ?>
  </ul>
  <br />
  <!-- Streamliste end -->
  </div>
  <!-- Streamübersichtkasten end -->
 
 <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">Aktuelle Zuh&oumlrer</h3>
 
  <!-- Zuhoererliste begin -->
  <div class="w3-panel w3-light-gray" >
  <ul class="w3-ul w3-center">
  <?php
     $out=system("./show_caller_numbers.sh");
  ?>
   </ul>
   </div>  
   <!-- Zuhoererliste end -->

   <div class="w3-panel w3-light-blue" style="border-radius: 5px">
   <p>Zuh&oumlrer: <?php system("./show_how_much_callers.sh"); ?></p>
   </div>  
</div> 

</div> 

  </div>
</div> 
<?php
   include('./layout/footer.php');
?>
