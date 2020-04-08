<?php
   include('./layout/navbar.php');
?>
<div class="w3-container w3-padding-32" style="background-color: #d4e1ff">
  <div class="w3-content" style="max-width:980px">

 <!-- Optionen Panel Begin-->
 <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">Eingetragene Nummern</h3>
  <?php
     system("./showlist.sh");
  ?>
  <br />
  <br/>
 </div>
  <!-- Optionen Panel End-->
  <br />

  <a href="deletelist.php" onclick="if(!confirm('Die aktuelle Liste unwiederuflich löschen?')) return false;"
     <button class="w3-button w3-dark-gray w3-round">Aktuelle Liste l&oumlschen</button>
  </a>
  <a href="listupload.php"
     <button class="w3-button w3-dark-gray w3-round">Neue Liste hochladen</button>
  </a>

 </div> 

  </div>
</div>

<?php
   include('layout/footer.php');
?>
