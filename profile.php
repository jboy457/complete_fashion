 <?php 
  if (isset($_GET['firstname']) && (isset($_GET['lastname']))) {
    $name = $_GET['firstname'] .' '. $_GET['lastname'];
  
}
  if (isset($_GET['email'])) {
    $mail = $_GET['email'];
  }

 ?>
<!DOCTYPE html>
<html>
<title>Users Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-white">
  <!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:20%;min-width:250px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Ankara</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Male Office Wears</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Female Office Wears</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Wedding Gowns</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">T-Shirts and Tops</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Other wears</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Gowns</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Shoes</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Sandals</a>
  <a href="secondpage.php" onclick="w3_close()" class="w3-bar-item w3-button">African cloths</a>
</nav>

<!-- Top menu -->
<div class="w3-top" style="background-color: white;">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <a href="profile.php" style="text-decoration: none;"><div class="w3-right w3-padding-16" ><img src="avatarm.png" style="width: 50px; height: 50px; border-radius: 50%; cursor: pointer;" alt="avatar" 

    title='<?php echo $name; ?>'></div></a>
    
    <div class="w3-center w3-padding-16" style="font-family: cursive;"><img src="logo.jpeg" height="30px" width="70px"/><b>Complete Fashion</b></div>
  </div>
  <div style="width: 100%; height: 2px; background-color: black;"></div>
</div>

<!-- Page Container -->
<div class="w3-content" style="max-width:1400px; margin-top: 90px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="avatarf.png" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2 class="w3-text-white">
              <?php 
                  echo $name;
               ?>
            </h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Customer</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>London, UK</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $mail; ?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Frequently viewed</b></p>
          <p>Wedding Gowns</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:70%">90%</div>
          </div>
          <p>Jewelries</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">
              <div class="w3-center w3-text-white">50%</div>
            </div>
          </div>
          <p>Ankara</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:40%">40%</div>
          </div>
          <p>Hair Dressing</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:32%">32%</div>
          </div>
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Ordered Products</b></p>
          <p>Jewelries</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:82%"></div>
          </div>
          <p>Women Skirts</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:56%"></div>
          </div>
          <p>Shoes</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
          </div>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Recently Ordered</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Complete Fashion Ankara Gown</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>12th June 2019 - <span class="w3-tag w3-teal w3-round">Not Delivered </span></h6>
          <p>Price: $400<br>Product ID:678967856767<br>A three-quater Ankara Gown. Sewing and Packaging proccess of the garment is ongoing. The Package should be delivered in the next 48hrs at your door step. Thanks.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Complete Fashion White T-Shirt</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>15th Mar 2019 - <span class="w3-tag w3-teal w3-round">Delivered </span></h6>
          <p>Product delivered<br>Product ID:56787654345<br>Location: 53,Olabiran Street, Somolu, Lagos.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Tony's Accessories: Silver Diamond pendant Ring</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>24th Jan 2019 - <span class="w3-tag w3-teal w3-round">Delivered </span></h6>
          <p>Product Delivered <br>Product ID:2345242589<br>Location: 53,Olabiran Street, Somolu, Lagos. </p><br>
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-shopping-cart fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Cart</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Alaopy's Leather Sandals</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>24th Jun 2019</h6>
          <h6 class="w3-opacity" style="text-align: right; padding-right: 20px;"> $450  </h6>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>London School Bag</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>19th Jun 2019</h6>
          <h6 class="w3-opacity" style="text-align: right; padding-right: 20px;"> $650  </h6>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Tonye's Full Office wear</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>17th Jun 2019</h6>
          <h6 class="w3-opacity" style="text-align: right; padding-right: 20px;"> $1250  </h6>
          <hr>
          <h5 class="w3-opacity" style="text-align: right; padding-right: 20px;"><b>TOTAL : <?php 
          $x = 650;
          $y = 450;
          $z = 1250;
          $total = $x + $y + $z;
          echo "$" . $total ;
           ?></b></h5>
        </div>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>


</body>
</html>
