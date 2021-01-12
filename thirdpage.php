<?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('location: already_account.php');
  }

  $user_fname = $_SESSION['firstname'];
  $user_lname = $_SESSION['lastname'];
  $user_email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<title>Complete Fashion</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:10px}

a:hover div.w3-quarter{
	-moz-box-shadow: 1px 1px 5px #999;
    -webkit-box-shadow: 1px 1px 5px #999;
        box-shadow: 1px 1px 5px #999;
        padding: 10px;
        cursor: pointer;
}
div.w3-quarter{
	padding: 5px;
}
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:20%;min-width:250px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Ankara</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Male Office Wears</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Female Office Wears</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Wedding Gowns</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">T-Shirts and Tops</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Other wears</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Gowns</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Shoes</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Sandals</a>
  <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">African cloths</a>
   <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Bags</a>
    <a href="compsignup.php" onclick="w3_close()" class="w3-bar-item w3-button">Wrist-Watch</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>


    <a href="logout.php"><div class="w3-right w3-padding-16"><i class="fa fa-hand-o-left"style="font-size: 48px; padding-left: 20px; color: blue;" title="Log Out"></i></div></a>

    <a href="userprofile.php" style="text-decoration: none;"><div class="w3-right w3-padding-16" ><img src="avatarm.png" style="width: 50px; height: 50px; border-radius: 50%; cursor: pointer;" alt="avatar" title="<?php echo $user_lname . ' ' . $user_fname; ?>"></div></a>
    <div class="w3-center w3-padding-16" style="font-family: cursive;"><img src="logo.jpeg" height="30px" width="70px"/><strong>Complete Fashion</strong></div>
  </div>
  <div style="width: 100%; height: 2px; background-color: black;"></div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <a><div class="w3-quarter">
      <img src="s7.jpg" alt="completefashion" style="width:100%">
      <h3>The Perfect Sandwich, A Real and Nice Casual Shoe</h3>
      <p>Price: $820</p>
    </div></a>
    <a><div class="w3-quarter">
      <img src="h1.png" alt="completefashion" style="width:100%">
      <h3>Let Me Tell You About This nice hair</h3>
      <p>Price: $100</p>
    </div></a>
    <a><div class="w3-quarter">
      <img src="tr1.jpg" alt="completefashion" style="width:100%">
      <h3>A Smart African Camo wear</h3>
      <p>Price: $340.</p>
      <p>What else?</p>
    </div></a>
    <a><div class="w3-quarter">
      <img src="t6.jpg" alt="Pasta and Wine" style="width:100%">
      <h3>Once Again, A Royal<br> T-Shirt</h3>
      <p>Price: $70.</p>
    </div></a>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <a><div class="w3-quarter">
      <img src="w1.jpg" alt="Popsicle" style="width:100%">
      <h3>All I Need Is an Attractive Wrist-Watch</h3>
      <p>Price: $270</p>
    </div></a>
    <a><div class="w3-quarter">
      <img src="b3.jpg" alt="Salmon" style="width:100%">
      <h3>A Mini Lady's School Bag</h3>
      <p>Price: $100.</p>
    </div></a>
    <a><div class="w3-quarter">
      <img src="w2.jpg" alt="Sandwich" style="width:100%">
      <h3>Black is Beauty, Black Wrist Watch</h3>
      <p>Price: $150</p>
    </div></a>
    <a><div class="w3-quarter">
      <img src="h3.png" alt="Croissant" style="width:100%">
      <h3>Ghana Weaving</h3>
      <p>Price: $110</p>
    </div></a>
  </div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="secondpage.php" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="firstpage.php" class="w3-bar-item w3-hover-black w3-button">1</a>
      <a href="secondpage.php" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="thirdpage.php" class="w3-bar-item w3-button w3-black ">3</a>
      <a href="foirthpage.php" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="foirthpage.php" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>LIKE WHAT YOU SEE?</h3>
      <p>Then give us a call and we will chat through what you need. We've got a Promo gift for the first 10 calls.</p>
      <div class="w3-panel w3-large">
    	<a href="https://www.facebook.com/completefashion/" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
   		<i class="fa fa-instagram w3-hover-opacity"><a href="https://www.instagram.com" target="_blank"></a></i>
    	<i class="fa fa-snapchat w3-hover-opacity"><a href="https://www.snapchat.com" target="_blank"></a></i>
    	<i class="fa fa-pinterest-p w3-hover-opacity"><a href="https://www.printerest.com" target="_blank"></a></i>
    	<i class="fa fa-twitter w3-hover-opacity"><a href="https://www.twitter.com" target="_blank"></a></i>
    	<i class="fa fa-linkedin w3-hover-opacity"><a href="https://www.linkedin.com" target="_blank"></a></i>
  </div>
      <p>Powered by <a href="https://www.facebook.com" target="_blank">Taiwo Adejare</a></p>
    </div>
  
    <div class="w3-third">
      <h3>BLOG POSTS</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="11.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Shoes</span><br>
          <span>Trending Shoes</span>
        </li>
        <li class="w3-padding-16">
          <img src="333.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">CF Gown</span><br>
          <span>Trending Wedding Gown</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third w3-serif">
      <h3>POPULAR LINKS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Shoes</span>
         <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Up shoulders</span>
          <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Wedding</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">ankara</span> 
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Trousers</span> 
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Gele Tie</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Sandals</span>
         <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ties</span> 
         <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Shirts</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Bags</span> 
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Belts</span> 
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Hairs</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">T-Shirts</span> 
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Shots</span>
      </p>
    </div>
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
