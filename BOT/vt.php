<?php
	include_once 'vars.php';
	
	function getThreads() {
		global $vars;

		$threads = array();

		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $vars['SUB_FORUM'],
		    CURLOPT_SSL_VERIFYPEER => false,
		    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17'
		));

		$resp = curl_exec($curl);
		curl_close($curl);

		$dom = new DOMDocument();

		@$dom->loadHTML($resp);

		$xpath = new DOMXPath($dom);

		$divThreads = $xpath->query('//div[@class="topicos"]'); //DOMNodeList

		foreach ($divThreads as $items) {
			foreach($items->getElementsByTagName('a') as $link) {
				array_push($threads, $vars['LINK_FORUM'] . $link->getAttribute('href'));
			}
		}

		return $threads;

	}

?>