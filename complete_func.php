<?php

	function displayErrors($field, $formerror){
		if (array_key_exists($field, $formerror)) {
			echo '<font color=red>' . $formerror[$field] . '</font>';
		}
	}


	function update($dbconn, $dbdata){
		$password = password_hash($dbdata['password'], PASSWORD_BCRYPT); 
		$register = $dbconn->prepare("INSERT INTO form(firstname, lastname, username, email, password) VALUES (:fn, :ln, :us, :em, :ps)");
		
		$info = [
			":fn" => $dbdata['firstname'],
			":ln" => $dbdata['lastname'],
			":us" => $dbdata['username'],
			":em" => $dbdata['email'],
			":ps" => $password
		];

		$register->execute($info);

		if ($register->rowCount() == 1) {
			# redirect user .. 
			header('location:already_account.php');
		}

	}

?>