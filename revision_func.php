<?php 

	function formerror($field, $error){

		if (array_key_exists($field, $error)) {
			echo '<font color=red>' . $error[$field]. '</font>';
		}
	}


	function addCustomer($dbconn, $dbdata){

		$password = password_hash($dbdata['password'], PASSWORD_BCRYPT);
		$stmt = $dbconn->prepare("INSERT INTO revisiontable(firstname, lastname, email, phone, password) VALUES (:fn, :ln, :em, :ph, :ps)");

		$data =[
			':fn' => $dbdata['firstname'],
			':ln' => $dbdata['lastname'],
			':em' => $dbdata['email'],
			':ph' => $dbdata['phonenumber'],
			':ps' => $password
		];

		$stmt->execute($data);

		if ($stmt->rowCount() == 1) {
			$account = createAccount($dbconn);
			$accountNumber = $account[0];
			$accountPin = $account[1];
			header('location: revision_createAccount.php?firstname='.$dbdata['firstname'].'&accNumber='.$accountNumber.'&pin='.$accountPin);
		}
	}

	function isLogin($dbconn, $em, $ps){
		$result = false;
		$statment = $dbconn->prepare("SELECT * FROM revisiontable WHERE email=:em");
		$statment->bindparam(":em", $em);
		$statment->execute();

		if ($statment->rowCount() != 1) {
			return [$result];		
		}
			
		$record = $statment->fetch(PDO::FETCH_ASSOC);
		
		if (!password_verify($ps, $record['password'])) {
			return [$result];
		}else{
			$result = true;
		}
		return [$result, $record];
	}

	function isTransferError($field, $error){
		if (array_key_exists($field, $error)) {
			 echo '<font color=red>' . $error[$field] . '</font>';
		}
	}

	function isPinCorrect($dbconn, $custID, $pin){
		$result = false;

		$stmt = $dbconn->prepare("SELECT * FROM account WHERE customer_id=:id and pin=:pin ");
		$stmt->execute([
			':id' => $custID,
			':pin' => $pin	
		]);

		if ($stmt->rowCount() == 1) {
			$result = true;
		}

		return $result;
	}

	/*function doTransferFrom( $custID, $acctNo, $dbconn, $amount){
		$result = false;

		# Get transferer account details
		$stmt = $dbconn->prepare("SELECT * FROM account WHERE customer_id=:id");
		$stmt->execute([
			':id' => $custID
		]);
		$accountDetail = $stmt->fetch(PDO::FETCH_ASSOC);

		# Check if account No. exist
		$stmt3 = $dbconn->prepare("SELECT * FROM account WHERE accNo=:acct");
		$stmt3->execute([
			":acct" => $acctNo,
		]);
		if ($stmt3->rowCount() != 1) {
			return $result;
		}

		# Check if account is Sufficient
		if ($accountDetail['balance'] < $amount) {
			return $result;
		}

		# if sufficient 
		if ($accountDetail['balance'] > $amount) {
			# Deduct form the transferer account 
			$stmt1 = $dbconn->prepare('UPDATE account SET balance= balance - :amount WHERE customer_id=:id');
			$stmt1->execute([
				":amount" => $amount,
				":id" => $custID
			]);

			#add to reciever's account
			$stmt2 = $dbconn->prepare("UPDATE account SET balance= balance + :amount WHERE accNo=:acct");
			$stmt2->execute([
				":amount" =>$amount,
				":acct" => $acctNo
			]);

			$result = true;
		}

		return $result;
	}
*/

	function transferFrom($customer, $beneficiary, $amount, $dbconn) {
		$balance = getCustomerBalance($customer, $dbconn);
		$Check = isBalanceCapable($balance, $amount);
		if (!$Check) {
			return $result;
		}else{
			 doTransaction($dbconn, $amount, $customer, $beneficiary);
			$result = true;
		}

		return $result;
	}

	function getCustomerBalance($customer, $dbconn){
		$stmt = $dbconn->prepare("SELECT * FROM account WHERE customer_id=:id");
		$stmt->execute([
			':id' => $customer
		]);

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$balance = $result['balance'];
		return $balance;
	}

	function isBalanceCapable($balance, $amount){
		 $result = false;
		 if ($balance < $amount) {
		 	return $result;
		 }else{
		 	$result = true;
		 }
		 return $result;
	}

	function doTransaction($dbconn, $amount, $customer, $beneficiary){
		# Deduct form the transferer account 
		$stmt1 = $dbconn->prepare('UPDATE account SET balance= balance - :amount WHERE customer_id=:id');
		$stmt1->execute([
			":amount" => $amount,
			":id" => $customer
		]);

		#add to reciever's account
		$stmt2 = $dbconn->prepare("UPDATE account SET balance= balance + :amount WHERE accNo=:acct");
		$stmt2->execute([
			":amount" =>$amount,
			":acct" => $beneficiary
		]);
	}

	function createAccount($dbconn){
		$accountNumber = mt_rand(1000000000, 9999999999);
		$pin = 1234;
		$balance = 0;
		$customer = getCustomerDetail($dbconn);
		$customer_id = $customer['id'];
		$account = addAccount($dbconn, $customer_id, $accountNumber, $balance, $pin);
		return [$accountNumber, $pin];
	}

	function getCustomerDetail($dbconn){
		$stmt = $dbconn->prepare("SELECT * FROM revisiontable ORDER BY id DESC LIMIT 1");
		$stmt->execute();

		$accountDetail = $stmt->fetch(	PDO::FETCH_ASSOC);
		return $accountDetail;
	}

	function addAccount($dbconn, $customer_id, $accountNumber, $balance, $pin){

		$stmt = $dbconn->prepare("INSERT INTO account(customer_id, accNo, pin, balance) VALUES(:id, :acc, :pin, :bal)");
		$stmt->execute([
			':id' => $customer_id,
			':acc' => $accountNumber,
			':pin' => $pin,
			':bal' => $balance
		]);
	}

	function changePin($dbconn, $accountNumber, $pin){
		$stmt = $dbconn->prepare("UPDATE account SET pin = :pin WHERE accNo=:acc");
		$stmt->execute([
			':pin' => $pin,
			':acc' =>$accountNumber
		]);
		/*var_dump($stmt->execute([
			':pin' => $pin,
			':acc' =>$accountNumber
		]));
		exit();*/
	}

	function listBeneficiaries($dbconn, $custID){

		$result = '';
		$stmt = $dbconn->prepare("SELECT * FROM beneficiary WHERE customer_id=:id");
		$stmt->bindparam(":id", $custID);
		$stmt->execute();

		while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result .= '<option value="'.$record['acctNo'].'">'. $record['firstname'] .' '.$record['lastname'].' - '. $record['acctNo']. '</option>';
		}
		return $result;
	}

	function getBeneficiaryDetails($dbconn, $accountNo){
		$stmt = $dbconn->prepare("SELECT * FROM account WHERE accNo=:acct");
		$stmt->execute([
			':acct' => $accountNo
		]);

		$record = $stmt->fetch(PDO::FETCH_ASSOC);
		$beneficiary_id = $record['customer_id'];
		

		$stmt1 = $dbconn->prepare("SELECT * FROM revisiontable WHERE id=:id");
		$stmt1->execute([
			':id' => $record['customer_id']
		]);

		$beneficiaryCredentials = $stmt1->fetch(PDO::FETCH_ASSOC);
		return $beneficiaryCredentials;

	}

	function insertBeneficiary($dbconn, $customer_id, $firstname, $lastname, $accountNo){
		$stmt = $dbconn->prepare("INSERT INTO beneficiary(customer_id, firstname, lastname, acctNo) VALUES(:id, :fn, :ln, :acct)");
		$data =[
			':id' => $customer_id,
			':fn' => $firstname,
			':ln' => $lastname,
			':acct' => $accountNo
		];
		// var_dump($stmt->execute($data));
		$stmt->execute($data);
	}

	function addBeneficiary($dbconn, $customer_id, $accountNo) {
		$record = getBeneficiaryDetails($dbconn, $accountNo);
		$firstname = $record['firstname'];
		$lastname = $record['lastname'];
		$insert = insertBeneficiary($dbconn, $customer_id, $firstname, $lastname, $accountNo);
	}


?>
