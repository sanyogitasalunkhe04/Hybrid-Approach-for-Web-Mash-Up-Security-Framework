<?php
	require_once('../../configuration.php');
	
	$query_string = $_GET['q'];
			
	if($query_string)
	{
		// appid = rdxQvmHV34GvDmuT1MVVBWn_jt93DKI3OdMlICUXwTrxSDJUZL8BVDCTAZFw5dxckg--
		$url = "http://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=".$query_string;

		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, 'http://127.0.0.1/');
		$body = curl_exec($ch);
		curl_close($ch);
		echo $body;
	}
	else
	{
		header("Location:".DOMAIN."/user_panel/news/index.php");
	}
?>
