<?php
	
	# define db credentials . . . 
	define('DBNAME', 'revision');
	define('DBUSER', 'root');
	define('DBPASS', 'jarex457');

	# Create a connection. . . 

	try{
		# prepare a PDO instance . . . 
		$conn = new PDO('mysql:host=localhost;dbname=' .DBNAME, DBUSER, DBPASS);

		# set a verbase error modes . . . 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	}catch(PDOexception $error){
		echo $error->getMessage();
	}
