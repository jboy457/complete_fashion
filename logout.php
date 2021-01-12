<?php
  session_start();
  session_destroy();
  session_start();

  include 'complete_config.php';
  $loginerror = [];

  if (array_key_exists('signin', $_POST)) {
      
      if (empty($_POST['username'])) {
         $loginerror['username'] = '<p>Please enter your Username</p>';
      }else{
          $user = $_POST['username'];
      }

      if (empty($_POST['password'])) {
        $loginerror['password'] = '<p>Please enter your Password</p>';
      }else{
         $pass = $_POST['password'];
      }

      # if everything is ok . . 
      if (empty($loginerror)) {
        
        # fetch user database  . . 

        $stmt = $conn->prepare("SELECT * FROM form WHERE username=:us");
        $stmt->bindparam(":us", $user);
        $stmt->execute();

        # Be sure the user was fetched . . 
        if ($stmt->rowCount() == 1){
          
          $record = $stmt->fetch(PDO::FETCH_ASSOC);

          if (password_verify($pass, $record['password'])) {
            
            # Create a session . . 
            $_SESSION['user_id'] = $record['id'];
            $_SESSION['firstname'] = $record['firstname'];
            $_SESSION['lastname'] = $record['lastname'];
            $_SESSION['email'] = $record['email'];

            # redirect user  . . .

            header('location: secondpage.php');

          }else{
            header('location:already_account.php?msg=Either username or Password is Incorrect');
          }
        }else{
          header('location:already_account.php?msg=Either Username or Password is Incorrect');
        }
      }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title> Complete Sign In</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}


body,h1,h2,h3,h4,h5,h6 {
  font-family: "Karma", sans-serif;
}
.w3-bar-block .w3-bar-item {padding:20px}


#login-box {
  position: relative;
  margin: 10% auto;
  width: 600px;
  height: 400px;
  background: #FFF;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 300;
  font-size: 28px;
}

input[type="text"],
input[type="password"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  height: 32px;
  border: none;
  border-bottom: 1px solid #AAA;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-bottom: 2px solid #16a085;
  color: #16a085;
  transition: 0.2s ease;
}

input[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background: #16a085;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

.or {
  position: absolute;
  top: 180px;
  left: 280px;
  width: 40px;
  height: 40px;
  background: #DDD;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  line-height: 40px;
  text-align: center;
}

.right {
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  background: url('https://goo.gl/YbktSj');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
}

.right .loginwith {
  display: block;
  margin-bottom: 40px;
  font-size: 28px;
  color: #FFF;
  text-align: center;
}

button.social-signin {
  margin-bottom: 20px;
  width: 220px;
  height: 36px;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  transition: 0.2s ease;
  cursor: pointer;
}

button.social-signin:hover,
button.social-signin:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin:active {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin.facebook {
  background: #32508E;
}

button.social-signin.twitter {
  background: #55ACEE;
}

button.social-signin.google {
  background: #DD4B39;
}
a.already_account{text-decoration: none;}
a.already_account:hover{
  font-family: cursive;
} 
 

  </style>
</head>
<body>
      <!-- Top menu -->
    <div class="w3-top">
      <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
        <a href="" style="text-decoration: none;"><div class="w3-button w3-padding-16 w3-left" onclick="w3_open()" style="">☰</div></a>
        <div class="w3-right w3-padding-16">Mail</div>
        <div class="w3-center w3-padding-16" style="font-family: cursive;"><img src="logo.jpeg" height="35px" width="70px"/>Complete Fashion</div>
      </div>
      <div style="width: 100%; height: 2px; background-color: black;"></div>
    </div>
<form action="already_account.php" method="POST">
    <div id="login-box">
  <div class="left">
    <a class="already_account" href="compsignup.php">Create a new account?</a>
    <h1>Sign in</h1>
    <?php
    if (isset($_GET['msg'])) {
      echo '<font color=red>'. $_GET['msg'] . '</font>';
    }
    ?>
    
   <p><input type="text" name="username" placeholder="Username" />
      <?php 
        if (array_key_exists('username', $loginerror)) {
          echo '<p><font color=red>' . $loginerror['username'] . '</font></p>';
        }
       ?>
   </p>
    <p><input type="password" name="password" placeholder="Password" />
      <?php 
        if (array_key_exists('password', $loginerror)) {
          echo '<p><font color=red>' . $loginerror['password'] . '</font></p>';
        }
       ?>
    </p>
    
    <input type="submit" name="signin" value="Sign in" />
  </div>
  
  <div style="background-image: url(77.jpg);" class="right">
    <span style="color: black;" class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>
  </div>
  <div class="or">OR</div>
    </div>
</form>    

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
        <span class="w3-tag w3-black w3-margin-bottom">Shoes</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Up shoulders</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Wedding</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">ankara</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Trousers</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Gele Tie</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Sandals</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ties</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Shirts</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Bags</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Belts</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Hairs</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">T-Shirts</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Shots</span>
      </p>
    </div>
  </footer>

<!-- End page content -->
</div>
</body>
</html>