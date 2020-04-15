<style>
* {
  box-sizing: border-box;
}

input[type=text],input[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #616161;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #515151;
}

.container {
  border-radius: 5px;
  background-color: #d4e1ff;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 85%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<?php
   require('checklogin.php');
?>
<div class="container">
  <form action="action_change_pass.php" method="POST">
  <!-- Username -->
  <div class="row">
    <div class="col-25">
      <label for="fname" style="color: black">Benutzername</label>
    </div>
    <div class="col-75">
    <input type="text" id="fname" name="telerix_user" placeholder="Dein neuer Benutzername" value="">
    </div>
  </div>
  <!-- End -->
  <div class="row">
    <div class="col-25">
      <label for="fname" style="color: black">Altes Passwort</label>
    </div>
    <div class="col-75">
    <input type="password" id="fname" name="telerix_old_pw" placeholder="Dein aktuelles Passwort" value="">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname" style="color: black">Neues Passwort</label>
    </div>
    <div class="col-75">
      <input type="password" id="lname" name="telerix_new_pw_a" placeholder="Das neue Passwort" value="">
    </div>
  </div>
  <div class="row">
   <div class="col-25">
      <label for="lname" style="color: black">Neues Passwort</label>
    </div>
    <div class="col-75">
      <input type="password" id="registrar" name="telerix_new_pw_b" placeholder="Die Wiederholung des neuen Passworts" value="">
    </div>
  </div>
  <br />
  <div class="row">
    <input type="submit" onclick="if(!confirm('Zugangsdaten anlegen? Nach dem ersten Anlegen, besteht eine Zugangsdatenpflicht. Diese lassen sich hier ändern.')) return false;" value="Speichern und Anwenden">
  </div>
  </form>
</div>
