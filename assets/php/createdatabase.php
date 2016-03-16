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


// Create a connection to database
$conn = mysql_connect($connection_string, $user, $password);

if (!$conn)
{
	die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully <br />';
// Create a query 
$query =" CREATE TABLE pag_php_starred_git_repo
				(	id 					INT(16) UNSIGNED 	AUTO_INCREMENT,
					git_id				INT(128) 		NOT NULL,
					git_name			VARCHAR(256)	NOT NULL,
					full_name			VARCHAR(512) 	NOT NULL,
					url					VARCHAR(2048)	NOT NULL,
					create_date			DATETIME		NOT NULL,
					last_push_date		DATETIME		NOT NULL,
					description			TEXT			NOT NULL,
					stargazers_count 	INT(128)		NOT NULL,
					
					img_url			VARCHAR(4096),
					homepage		VARCHAR(4096),
					language		VARCHAR(256),
					update_date		DATETIME,					
					
					PRIMARY KEY (id),
					UNIQUE	id	(id)
					
				)
		";
mysql_select_db($database);
// Execute query and close
$retval = mysql_query($query, $conn);
if(! $retval)
{
	die('Could not create table: ' . mysql_error());
}
echo "Table created successfully\n";
mysql_close();

?>