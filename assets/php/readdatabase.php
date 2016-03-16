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

// Create a connection to database
$conn = mysql_connect($connection_string, $user, $password);
if (! $conn)
{
	$message_flag = 2;
	$message_short_log = "Fail";
	$message_log = "Could not connect to the database. Please, come back later";
	//$message_log = "Could not connect: " . mysql_error();
	//die('Could not connect: ' . mysql_error());
}
mysql_select_db($database);

// Create a query 
$query =" SELECT * FROM pag_php_starred_git_repo";

$retval = mysql_query($query, $conn);
if (! $retval)
{
	$message_flag = 3;
	$message_short_log = "Fail";
	$message_log = "Could not get data. Please, come back later";
	//$message_log = "Could not connect: " . mysql_error();
	//die('Could not get data: ' . mysql_error());
}

/*//
while ($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
	$git_id = $row['git_id'];
	$git_name = $row['git_name'];
	$full_name = pag_decode_data($row['full_name']);
	$url = pag_decode_data($row['url']);
	$create_date = $row['create_date'];
	$last_push_date = $row['last_push_date'];
	$description = pag_decode_data($row['description']);
	
	$stargazers_count = $row['stargazers_count'];
	$img_url = pag_decode_data($row['img_url']);
	$homepage = pag_decode_data($row['homepage']);
	$language = pag_decode_data($row['language']);
	$update_date = $row['update_date'];
	
	echo $git_id . '<br />';
	echo $git_name . '<br />';
	echo $full_name . '<br />';
	echo $url . '<br />';
	echo $create_date . '<br />';
	echo $last_push_date . '<br />';
	echo $description . '<br />';

	echo $stargazers_count . '<br />';
	echo $img_url . '<br />';
	echo $homepage . '<br />';
	echo $language . '<br />';
	echo $update_date . '<br />';
	echo "----------------------------------------------------------<br />";
	
}

// We release cursor memory and then close connection
mysql_free_result($retval);
echo "Fetched data successfully\n";
mysql_close($conn);
//*/
?>