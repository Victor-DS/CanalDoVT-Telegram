<?php
	include_once 'vars.php';

	function sendMessage($text) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => getURL($text),
		    CURLOPT_CONNECTTIMEOUT => 5,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_SSL_VERIFYPEER => false,
		    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17'
		));

		$resp = curl_exec($curl);

		$error = curl_error($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		// Close request to clear up some resources
		curl_close($curl);

		if($httpCode == 200) {
			return $resp;
		} else {
			return $httpCode . ' - ' . $error;
		}
	}

?>