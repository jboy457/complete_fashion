<?php
	include 'revision_func.php';
	include 'revision_config.php';
	$error = [];

	# Validate form

	if (array_key_exists('submit', $_POST)) {
		
		if (empty($_POST['firstname'])) {
			$error['firstname'] = 'Please enter your firstname';
		}else{
			$fn = $_POST['firstname'];
		}
		if (empty($_POST['lastname'])) {
			$error['lastname'] = 'Please enter your lastname';
		}else{
			$ln = $_POST['lastname'];
		}
		if (empty($_POST['email'])) {
			$error['email'] = 'Please enter your email';
		}else{
			$em = $_POST['email'];
		}
		if (empty($_POST['phonenumber'])) {
			$error['phonenumber'] = 'Please enter your phonenumber';
		}else{
			$ph = $_POST['phonenumber'];
		}
		if (empty($_POST['password'])) {
			$error['password'] = 'Please enter your password';
		}else{
			$ps = $_POST['password'];
		}

		if (empty($error)) {
			
			$_trimmed = array_map('trim', $_POST);
			addCustomer($conn, $_trimmed);	
			// creatAccount($conn);
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Revision</title>
</head>
<body>

	<h1>REGISTRATION</h1>
	<form action="revision.php" method="POST">
		<p>Firstname:<input type="text" name="firstname">
			<?php formerror('firstname', $error); ?></p>
		<p>Lastname:<input type="text" name="lastname">
		<?php formerror('lastname', $error); ?></p>
		<p>Email:<input type="text" name="email">
			<?php formerror('email', $error); ?></p>
		<p>Phone:<input type="number" name="phonenumber"><?php formerror('phonenumber', $error); ?></p>
		<p>Password:<input type="password" name="password"><?php formerror('password', $error); ?></p>
		<p><input type="submit" name="submit" onclick="" value="sign me up"></p>
	</form>

</body>
</html>