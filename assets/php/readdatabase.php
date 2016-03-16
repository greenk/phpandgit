<?php

/*	Create a table in database
 *	Author: Binh Bui
 * 	Version: 1.0
 *	License: #
 *	Last modified: 03/08/2016
 */
// Setting
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/php/setting.php');
require_once(__ROOT__.'/php/common_func.php');

// Define log variable
// message_flag = 1 : sucess
// message_flag = 2 : could not connect to database
// message_flag = 3 : could not query data
$message_flag = 1;
$message_short_log = "Success";
$message_log = "Success";

try {
	$dbh = new PDO("mysql:host=$connection_string; dbname=$database", $user, $password);	
	
	//set error mode for debugging
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//prepare query
	if ($pager)
	{
		$sth = $dbh->prepare('SELECT * FROM pag_php_starred_git_repo WHERE id >= :id LIMIT 20 ');		
		$sth->bindParam(':id', $pager);
	}
	else	
		$sth = $dbh->prepare("SELECT * FROM pag_php_starred_git_repo LIMIT 20");	
	
	//set the way to receive data
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	$result = $sth->execute();		
}
catch (PDOException $e){
	echo $e->getMessage();
	$message_flag = 2;
	$message_short_log = 'Fail';
	//$message_log = 'Could not connect to the database. Please, check again later';
	$message_log = 'Could not connect: ' . $e->getMessage();
}

?>