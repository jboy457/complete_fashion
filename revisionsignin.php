<?php
	session_start();
	include 'revision_config.php';
	include 'revision_func.php';
	$loginerror = [];

	if (array_key_exists("login", $_POST)) {
		
		if (empty($_POST['email'])) {
			$loginerror['email'] = 'please enter your email';
		}else{
			$em = $_POST['email'];
		}
		if (empty($_POST['password'])) {
			$loginerror['password'] = 'please enter your password';
		}else{
			$ps = $_POST['password'];
			$check = isLogin($conn, $_POST['email'], $_POST['password']);
			if ($check[0]) {
				$record = $check[1];
			
				#Create a session  . . . 
				$_SESSION['user_id'] = $record['id'];
				$_SESSION['firstname'] = $record['firstname'];
				$_SESSION['lastname'] = $record['lastname'];
				$_SESSION['email'] = $record['email'];

				# Redirect user . . .
				header('location: revision_welcome.php');
			}
			
			if (!$check[0]) {
				header('location: revisionsignin.php?msg=Either username or password is Incorrect');
			}
		}

		# if everything is OK
		if (empty($loginerror)) {
			
					
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1> SIGN IN </h1>
	<form action="revisionsignin.php" method="POST">
		<?php if (isset($_GET['msg'])) {
			echo $_GET['msg'];
		} ?>
	<p>Email:<input type="text" name="email">
		<?php if (array_key_exists('email', $loginerror)) {
			echo $loginerror['email'];
		} ?></p>
	<p>Password:<input type="password" name="password">
		<?php if (array_key_exists('password', $loginerror)) {
			echo $loginerror['password'];
		} ?></p>
	<p><input type="submit" name="login"></p>
	</form>
</body>
</html>