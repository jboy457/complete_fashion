<?php 
	session_start();

	if (!isset($_SESSION['user_id'])) {
		header('location: revisionsignin.php');
	}

	$customer_id = $_SESSION['user_id'];
	$customer_fname = $_SESSION['firstname'];
	$customer_lname = $_SESSION['lastname'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Welcome <?php echo $customer_fname . ' ' .$customer_lname ; ?> </h1>

	<ul>
		<li><a href="revision_transfer.php"> Transfer funds</a></li>
		<li><a href="revisionsignin.php"> Log Out</a></li>
	</ul>
</body>
</html>