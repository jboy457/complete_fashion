<?php 
	# assign value to database . . .
	define('DBNAME', 'complete');
	define('DBUSER', 'root');
	define('DBPASS', 'jarex457');

	try{
		# create a PDO instance . . . 
		$conn = new PDO ('mysql:host=localhost;dbname=' . DBNAME, DBUSER, DBPASS);

		# set a verbase error mode . . . 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	}catch (PDOexception $error){
		echo $error->getMessage();
	}