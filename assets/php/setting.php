<?php
	//define('__ROOT__', dirname(dirname(__FILE__)));

	// Set timezone to UTC time + 0, to match with Git timezone (Y-m-d\TH:i:s\Z).
	// If need to display in local time, calculation is needed
	date_default_timezone_set('UTC');

	//Set your database username, password and database name, connection string
	$user = "binhbui";
	$password = "5UwpPRVK63bjPQ9B";
	$database = "phpandgit";
	$connection_string = "localhost:3306";
?>