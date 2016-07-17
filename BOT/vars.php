<?php

	$vars = array();

	$vars['API_ENDPOINT'] = 'https://api.telegram.org/bot';
	$vars['BOT_TOKEN'] = 'TOKEN';

	$vars['CHAT_ID'] = 'CHAT_ID';

	$vars['SEND_MESSAGE'] = $vars['API_ENDPOINT'] . $vars['BOT_TOKEN'] . '/sendMessage';

	$vars['LINK_FORUM'] = 'http://forum.jogos.uol.com.br';
	$vars['SUB_FORUM'] = $vars['LINK_FORUM'] . '/vale-tudo_f_57';

	function getURL($text) {
		global $vars;
		return $vars['SEND_MESSAGE'] . '?chat_id=' . $vars['CHAT_ID'] . '&text=' . $text;
	}

?>