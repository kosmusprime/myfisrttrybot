<?php
ini_set('error_reporting', E_ALL);

// Set url to send back response message
$bot_token = "5199407892:AAGDHHh2EMCg1AliXyhCx40gj9jpOeW7mhw";
$website = "https://api.telegram.org/bot{$bot_token}";

// Get message contenant
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

// Get commands and user chat id
$chat_id = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

// Command test
switch($message){
	case "/test":
		send_message($chat_id, "Server response test");
		break;
	case "/hi":
		send_message($chat_id, "Server response hi");
		break;
	default:
		send_message($chat_id, "Server response default");
		break;
}

// Send message back to user
// Send message back to user
function send_message($chat_id, $message){
	$data = ['chat_id' => $chat_id, 'text' => ""]; //,'text' => rawurlencode($message)
	$url = "{$GLOBALS['website']}/sendMessage?".http_build_query($data).$message;
	file_get_contents($url);
}
?>
