<?php 
	
	include 'revision_config.php';
	include 'revision_func.php';
	if (isset($_GET['firstname']) && isset($_GET['accNumber']) && isset($_GET['pin'])) {
		$accountNumber = $_GET['accNumber'];
		$pin = $_GET['pin'];
	}
	
	if (array_key_exists('submit', $_POST)) {
		
		if (!empty($_POST['pin'])) {
			$newPin = $_POST['pin'];
		}
		changePin($conn, $accountNumber, $newPin);
		header('location: revisionsignin.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create a new account</title>
</head>
<body>			
	<h1>Congratulation!!!!!</h1>
	<h4>Thanks for Opening ac account with Guru Bank&reg</h4>
	<p><strong>Account Number:</strong><?php echo $accountNumber ?></p>
	<p><strong>Default Pin:</strong><?php echo $pin ?></p>
	<h5>You are advised to change Your pin</h5>
	<form method="POST" action="<?php echo 'revision_createAccount.php?firstname='.$_GET['firstname'].'&accNumber='.$_GET['accNumber'].'&pin='.$pin ?>" >
		<label><strong>New Pin:</strong></label>
		<input type="text" name="pin" placeholder="Enter Pin" required>
		<input type="submit" name="submit" value="CHANGE">
	</form>
</body>
</html>