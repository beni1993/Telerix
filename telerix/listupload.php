<?php
   require('checklogin.php');
   include('./layout/navbar.php');
?>
<div class="w3-container w3-padding-32" style="background-color: #d4e1ff">
  <div class="w3-content" style="max-width:980px">


<?php
if ( $_FILES['uploaddatei']['name']  <> "*.*" )
{
    // Datei wurde durch HTML-Formular hochgeladen
    // und kann nun weiterverarbeitet werden
    move_uploaded_file (
         $_FILES['uploaddatei']['tmp_name'] ,
         'uploads/'. $_FILES['uploaddatei']['name'] );

    $ret = system("./createlist.sh");
    /*echo "<p>Hochladen war erfolgreich: ";
    $ret = system("/var/www/html/createlist.sh");
    echo "<a href=settings.php><button>OK</button></a>";*/
}
?>


<div class="w3-card w3-panel w3-light-blue w3-padding">
<h3>Telefonnummerliste Upload</h3>
<h5>Bitte hier eine Liste im txt-Format mit den Telefonnummern hochladen.<br />
   Nach folgendem beispielhaften Aufbau:<br /></br>Max Mustermann 06011123<br />
   Erika Muster 0123112323<br />John Doe 0232142312<br /><br /><br />
   Mehrere Listen sind nacheinander möglich.<br />
   Neue Listen werden hinten an die bereits vorhandenen angehängt.
</h5>
<br />
</div>
<form name="uploadformular" enctype="multipart/form-data" action="listupload.php" method="post">
<input type="file" name="uploaddatei" size="60" maxlength="255" class="w3-button w3-blue">
<input type="Submit" name="submit" value="Datei hochladen" class="w3-button w3-dark-gray">
<a href='settings.php'><input type="button" value="Fertig" class="w3-button w3-dark-gray" /></a>
</form>

 </div>

  </div>
</div>

<?php
   include('./layout/footer.php');
?>
