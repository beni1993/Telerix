<?php
   require('checklogin.php');
   include('./layout/navbar.php');
?>

<div class="w3-container w3-padding-32" style="background-color: #d4e1ff">
  <div class="w3-content w3-white" style="max-width:980px">

 <!-- Optionen Panel Begin-->
 <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">Hilfe</h3>



<!-- Frage 01 -->
<button onclick="klappmenu('Frage1')" class="w3-button w3-block w3-left-align w3-light-blue">
<h6>Wie kann ich zur Weiterentwicklung von TELERIX beitragen?</h6></button>

<div id="Frage1" class="w3-hide w3-container w3-light-blue">
  <p>Wenn du C, PHP oder Bashskripte programmieren kannst, oder dich mit Asterisk, HTML, CSS oder Regex auskennst,
     kannst du dich gern im &ouml;ffentlichen Repository an der Entwicklung beteiligen. <br />Die Repositories f&uuml;r 
     Telerix findest du unter folgendem GitHub-Account: <a href="https://github.com/beni1993" target="_blank">github.com/beni1993</a> </p>
  <p>Wenn du mich kennst, kannst du gerne auch Verbesserungsvorschl&auml;ge und Kritik weitergeben.</p>
</div>
<!-- End -->
<br />

<!-- Frage 02 -->
<button onclick="klappmenu('Track2')" class="w3-button w3-block w3-left-align w3-light-blue">
<h6>Auf welchen Plattformen l&auml;uft TELERIX?</h6></button>

<div id="Track2" class="w3-hide w3-container w3-light-blue">
  <p>&bull; Ubuntu 18.04.4 LTS</p>
  <p>&bull; Ubuntu Server 18.04.4 LTS</p>
  <p>und vermutlich auf den meisten Debianbasierenden Systemen</p>
</div>
<!-- End -->
<br />

<!-- Frage 03 -->
<button onclick="klappmenu('Track3')" class="w3-button w3-block w3-left-align w3-light-blue">
<h6>Wie kann ich TELERIX installieren?</h6></button>

<div id="Track3" class="w3-hide w3-container w3-light-blue">
  <p>Software zum herunterladen und entpacken  mit folgendem Befehl im Terminal installieren:<br />
  <i><b>sudo apt install unzip wget</b></i></p>
  <p>Das Repository mit folgendem Befehl herunterladen:<br />
  <i><b>sudo wget https://github.com/beni1993/Telerix/archive/master.zip</b></i></p>
  <p>Die heruntergeladene Zip-Datei entpacken<br />
  <i><b>sudo unzip master.zip</b></i></p>
  <p>Die Ausführung der Skripts in dem entpackten Ordner erlauben<br />
  <i><b>sudo chmod 777 -R ./Telerix-master</b></i></p>
  <p>Installation starten<br />
  <i><b>sudo ./Telerix-master/Install.sh</b></i></p>
  <p>Alle weitere Schritte zur Konfiguration beschreibt die Installation.</p>
</div>
<!-- End -->
<br />

<!-- Frage 04 -->
<button onclick="klappmenu('Frage 04')" class="w3-button w3-block w3-left-align w3-light-blue">
<h6>Was tun wenn das Webinterface Zeichen aus der Konfiguration entfernt?</h6></button>

<div id="Frage 04" class="w3-hide w3-container w3-light-blue">
  <p>Wenn aus der Streamadresse oder den SIP-Daten Zeichen verschwinden,
     liegt das an einem Sicherheitsmechanismus von Telerix.<br />
     Benutztereingaben werden n&auml;mlich von allen Sonderzeichen bereinigt.<br />
     Hintergrund ist, das es unm&ouml;glich gemacht werden soll, durch Eingabe
     von speziellen Zeichen, die Eingabe zu beenden und eigene Kommandos auf
     dem Server auszuf&uuml;hren.</p>
     <p>In diesem Fall kontaktieren Sie bitte die Entwickler und teilen sie das Zeichen mit,
        da hier ein legales Zeichen vermutlich weggefiltert wurde.</p>
</div>
<!-- End -->

<br /> <!-- Unten Platz schaffen -->

</div>
<script>
function klappmenu(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

 </div>
  <!-- Optionen Panel End-->
 </div> 
  </div>
</div>

<?php
   include('./layout/footer.php');
?>
