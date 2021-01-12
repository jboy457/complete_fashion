<?php 

	$error = [];

	if (array_key_exists('login', $_POST)) {
		
		if (empty($_POST['email'])) {
			$error['email'] = '<font color=red>Please Enter Your Email</font>';
		}else{
			$em = $_POST['email'];
		}

		if (empty($_POST['password'])) {
			$error['password'] = '<font color=red>Please Enter your password</p>';
		}else{
			$ps = $_POST['password'];
		}

		$stmt

	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>

	<style type="text/css">
		
		form {
			padding-left: 25%;
			
		}

		hr{
			width: 70%;
		}

		h1{
			padding-left: 22%;
			margin-top: 5%;
		}

	</style>
</head>
<body>
	<h1>Login Form</h1>
	<hr>

	<form action="class.php" method="POST">
		<p><label>Email:</label>
			<input type="text" name="email"></p>
			<?php 
			
				if (array_key_exists('email', $error)) {
					echo $error['email'];
				} 

			?>
			<br>
		<p><label>Password:</label>
		<input type="password" name="password"></p>
			<?php 

				if (array_key_exists('password', $error)) {
					echo $error['password'];
				}

			 ?>
			 <br>
		<input type="submit" name="login">
	</form>
</body>
</html>