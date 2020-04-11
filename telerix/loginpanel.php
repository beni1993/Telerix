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

<div class="container">
  <form action="login.php" method="POST">
  <div class="row">
    <div class="col-25">
      <label for="fname" style="color: black">Benutzer</label>
    </div>
    <div class="col-75">
    <input type="text" id="fname" name="tuser" placeholder="Dein Telerix Benutzername" value="">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname" style="color: black">Passwort</label>
    </div>
    <div class="col-75">
      <input type="password" id="lname" name="tpass" placeholder="Dein Telerix Passwort" value="">
    </div>
  </div>
  <br />
  <div class="row">
    <input type="submit" value="Login">
  </div>
  </form>
</div>
