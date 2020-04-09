<?php
   include('./layout/navbar.php');
?>
<div class="w3-container w3-padding-32" style="background-color: #d4e1ff">
  <div class="w3-content w3-white" style="max-width:980px">

 <!-- Optionen Panel Begin-->
 <div class="w3-panel w3-card-4 w3-blue">
  <h3 style="color: #ffffff">Informationen</h3>

  <div class="w3-panel w3-light-gray" style="border-radius:5px" >
  <ul class="w3-ul">
  <li>Telerix-Version: 0.01</li>
  <li>Asterisk-Version: <?php system("asterisk -V | egrep '^[^~]+' -o"); ?></li>
  <li>Datum: 9 April 2020</li>
  <li>Webinterface-Lizenz: zLib</li>
  <li>Betriebssystem: <?php system("lsb_release -d | sed 's/Description..//g'"); ?></li>
  <li>Dankesch&oumln f&uumlr die Unterst&uumltzung an Edgar W, Martin G, Eduard D, Alex J, Daniel L und Viktor B</li>
  </ul>
  </div>  
 
Copyright (c) 2020 Benjamin Hedert
<br/>
This software is provided 'as-is', without any express or implied warranty. In no event will the authors be held liable for any damages arising from the use of this software. <br />
Permission is granted to anyone to use this software for any purpose, including commercial applications, and to alter it and redistribute it freely, subject to the following restrictions:<br />
1) The origin of this software must not be misrepresented; you must not claim that you wrote the original software. If you use this software in a product, an acknowledgment in the product documentation would be appreciated but is not required.<br />
2) Altered source versions must be plainly marked as such, and must not be misrepresented as being the original software.<br />
3) This notice may not be removed or altered from any source distribution.<br />

  <div class="w3-panel w3-light-blue" style="border-radius:5px" >
  <ul class="w3-ul">
  <li>Hinweis! Diese Version ist nur f&uumlr den Betrieb im lokalen Netzwerk gedacht.</li>
  <div/>


 </div>
  <!-- Optionen Panel End-->
 </div> 

  </div>
</div> 

<?php
   include('./layout/footer.php');
?>
