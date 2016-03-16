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
$message_flag = 1;
$message_short_log = "Success";
$message_log = "Success";

// Get the Json object from GIT API
$git_api_url = "https://api.github.com/search/repositories?q=stars%3A%3E1+language:PHP&sort=start&order=desc";
$git_content_result = get_content($git_api_url);
//convert content into an associate array for processing
$git_content_result_decode = json_decode($git_content_result, true, 5);


try {
	$dbh = new PDO("mysql:host=$connection_string; dbname=$database", $user, $password);	
	
	//set error mode for debugging
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//for production
	//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	foreach ($git_content_result_decode['items'] as $item)
	{
		
		$git_id = intval($item['id']);
		$git_name = $item['name'];
		$full_name = $item['full_name'];
		$url = $item['html_url'];
		$create_date = date('Y-m-d\TH:i:s\Z', strtotime($item['created_at']));
		$last_push_date = date('Y-m-d\TH:i:s\Z', strtotime($item['pushed_at']));
		$description = $item['description'];
		$stargazers_count = intval($item['stargazers_count']);
		$img_url = $item['owner']['avatar_url'];
		$homepage = $item['homepage'];
		$language = $item['language'];
		$update_date = date('Y-m-d\TH:i:s\Z', strtotime($item['updated_at']));
						
		//prepare query
		$sth = $dbh->prepare("SELECT git_id FROM pag_php_starred_git_repo WHERE git_id = :git_id");
		$sth->bindParam(':git_id', $git_id);
		$sth->execute();
		
		if($sth->rowCount() > 0)
		{
			$sth = $dbh->prepare("UPDATE pag_php_starred_git_repo SET " . 
			"git_name = :git_name , full_name = :full_name, url = :url, create_date = :create_date, last_push_date = :last_push_date, description = :description, stargazers_count = :stargazers_count, img_url = :img_url, homepage = :homepage, language = :language, update_date = :update_date".
			" WHERE git_id=:git_id");
			$message_log = 'Updating the existing row was success';
		}		
		else{
			$sth = $dbh->prepare(" INSERT INTO pag_php_starred_git_repo ".
			"	( git_id, git_name, full_name, url, create_date, last_push_date, description, stargazers_count, img_url, homepage, language, update_date) " .
			" VALUES ".
			"	( :git_id, :git_name , :full_name, :url, :create_date, :last_push_date, :description, :stargazers_count, :img_url, :homepage, :language, :update_date)");			
			$message_log = 'Inserting new row was suceess';
		}	
		
		//bind data	
		$sth->bindParam(':git_id', $git_id);
		$sth->bindParam(':git_name', $git_name);
		$sth->bindParam(':full_name', $full_name);
		$sth->bindParam(':url', $url);
		$sth->bindParam(':create_date', $create_date);
		$sth->bindParam(':last_push_date', $last_push_date);
		$sth->bindParam(':description', $description);
		$sth->bindParam(':stargazers_count', $stargazers_count);
		$sth->bindParam(':img_url', $img_url);
		$sth->bindParam(':homepage', $homepage);
		$sth->bindParam(':language', $language);
		$sth->bindParam(':update_date', $update_date);
		
		//set the way to receive data
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		//*/	
		$result = $sth->execute();

		
	}
		
	//Close connection
	$dbh = null;
}
catch (PDOException $e){
	echo $e->getMessage();
	$message_flag = 2;
	$message_short_log = 'Fail';
	//$message_log = 'Could not connect to the database. Please, check again later';
	$message_log = 'Could not connect: ' . $e->getMessage();
}

?>