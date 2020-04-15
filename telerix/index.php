<?php
   include('./nopassword.php');
   if($key == "NO_PASSWORD_REQUIRED")
   {
      session_start();
      $_SESSION['status'] = "logged in";
      include('./start.php');
      exit;
   } 

   include('./layout/navbar_empty.php');
?>
<div class="w3-container w3-padding-32" style="background-color: #d4e1ff">
  <div class="w3-content" style="max-width:980px">


  <!-- Streamübersichtkasten begin -->
  <div class="w3-panel w3-card-4 w3-blue" style="border-radius: 15px;">
  <h2 class="w3-center w3-padding-16" style="color: #ffffff">Login</h2>
  <!-- Login Panel begin -->
  <?php
      include('loginpanel.php');  
  ?>
  <br />
  <!-- Login Panel end -->
  </div>
  <!-- Streamübersichtkasten end -->

</div> 

</div> 

  </div>
</div> 
<?php
   include('./layout/footer.php');
?>
