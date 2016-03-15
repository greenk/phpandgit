<?php
/*	Support function for PHP And Git app
 *	Author: Binh Bui
 * 	Version: 1.0
 *	License: #
 *	Last modified: 03/08/2016
 */
 
 function pag_encode_escape_data ($data)
 {
	$tempdata = urlencode($data);
	$tempdata = mysql_real_escape_string($tempdata);
	
	return $tempdata;
 }
 
 function pag_decode_data ($data)
 {
	$tempdata = urldecode($data);
	
	return $tempdata;
 }
 
 /** 
  *	Connect to github and get content from api url
  *	Using curl to make a get request
  */
function get_content ($url) {
	$connect_handler = curl_init($url);
	curl_setopt($connect_handler, CURLOPT_URL, $url);
	curl_setopt($connect_handler, CURLOPT_RETURNTRANSFER, 1);
	
	// Set header for get request
	curl_setopt($connect_handler, CURLOPT_HTTPHEADER,array('User-Agent: Binh-Bui-AppTest'));
	
	// Set SSL_VERIFYPEER to false to make HTTPS connection work
	// If security is needed, use Firefox to download the ssl certificate and then use it with CURLOPT_SSL_VERIFYPEER
	curl_setopt($connect_handler, CURLOPT_SSL_VERIFYPEER, false);		
	curl_setopt($connect_handler, CURLOPT_CONNECTTIMEOUT, 1);	
	
	$content = curl_exec($connect_handler);
	curl_close($connect_handler);
	
	return $content;
}