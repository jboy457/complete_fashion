<?php
	session_start();
	include 'revision_func.php';
	include 'revision_config.php';

	$error = []; 

	# Make sure important fields are filled up
	if (array_key_exists('transfer', $_POST)) {
		
		/*if (empty($_POST['account']) && ($_POST['bene']) == 0) {
			 $error['account'] = "Please enter Account No. Or choose a Beneficiary";
		}*/
		if (empty($_POST['account']) && ($_POST['beneficiary']) == 0) {
			$error['account']  = 'You must enter account no. or select beneficiary';
		}

		if (!empty($_POST['account']) && ($_POST['beneficiary']) != 0) {
			$error['account'] = "Please is Either You Enter an Account nuumber or choose a Beneficiary";
		}

		/*if (($_POST['addbeneficiary']) == 'add') {
			addBeneficiary($conn, $_SESSION['user_id'], $_POST['account']);
		}
*/
		if (empty($_POST['amount'])) {
			$error['amount'] = "Please enter an Amount";
		}else{
			$amount = $_POST['amount'];
		}

		if (empty($_POST['pin'])) {
			$error['pin'] = "Please enter your Pin";
		}else{
			# Check if pin is correct
			$check = isPinCorrect($conn, $_SESSION['user_id'], $_POST['pin']);
			
			if (!$check) {
				$error['pin'] = 'Invalid Pin';
			}
		}
		if (empty($error)) {
			$check = transferFrom($_SESSION['user_id'], $_POST['account'], $_POST['amount'], $conn);
			addBeneficiary($conn, $_SESSION['user_id'], $_POST['account']);
			if (!$check) {
			 	header('location:revision_transfer.php?msg= Insufficient Funds or Invalid Account number');
			 } else{
			header('location:revision_transfer.php?msg=Transaction Successful');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transfer Funds</title>
</head>
<body>
	<form method="POST" action="revision_transfer.php">
		<?php 
			if (isset($_GET['msg'])) {
				echo '<h1>' . $_GET['msg'] . '</h1>';
			}
		?>
		<input type="text" name="account" placeholder="Reciever's Account No.">
		<?php isTransferError('account', $error); ?>
		<br>
		<input type="checkbox" name="addbeneficiary" value="add"><em>Add beneficiary</em>
		<br>
		<select style="width: 166px" name="beneficiary">
			<option value="0">Beneficary</option>
			<?php
				$beneficiaryList = listBeneficiaries($conn, $_SESSION['user_id']);
				echo $beneficiaryList;
			 ?>
		</select>
		<br>
		<input type="text" name="amount" placeholder="Enter Amount">
		<?php isTransferError('amount', $error) ?>
		<br>
		<input type="password" name="pin" placeholder="Enter Pin">
		<?php isTransferError('pin', $error) ?>
		<br>
		<input type="submit" name="transfer" value="Transfer">
	</form>
</body>
</html>