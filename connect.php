<?php 


	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "healthyburst";

	$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		if ($db->connect_error) {
			die("FAILED TO CONNECT" .$db->connect_error);
		}else{
			echo "";
		}

 ?>