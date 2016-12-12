<?php
error_reporting(0);
$access_token     = "your_access_token";
$verify_token     = "meow_meow_meow";
$hub_verify_token = null;

if (isset($_REQUEST['hub_challenge'])) {
    $challenge        = $_REQUEST['hub_challenge'];
    $hub_verify_token = $_REQUEST['hub_verify_token'];
}

if ($hub_verify_token === $verify_token) {
    echo $challenge;
}

$input            = json_decode(file_get_contents('php://input'), true);
$sender           = $input['entry'][0]['messaging'][0]['sender']['id'];
$message          = $input['entry'][0]['messaging'][0]['message']['text'];
$message_to_reply = '';

if (preg_match('[help|Help]', strtolower($message))) {
    $help_me = "This App can send you photos depends on what you type using Google Custom Search just type what you want to search about eg. jesus  there is 100 search/day only, Have a question? https://goo.gl/OLP4dz";
    
    $message_to_reply = $help_me;
    
    $jsonData = '{
            "recipient":{
                "id":"' . $sender . '"
            },
            "message":{
                "text":"' . $message_to_reply . '"
            }
    }';
} else {
    $key = "your_key";
    
    // your googleapis key https://console.developers.google.com/apis/credentials?project=[your project]
    
    $cx = "your cx id";
    
    // your cx id https://cse.google.com/cse/manage/all
    
    $json_url = "https://www.googleapis.com/customsearch/v1?q=" . $message . "&key=" . $key . "&cx=" . $cx . "&searchType=image";
    $str      = file_get_contents($json_url);
    $json     = json_decode($str, true);
}

$url = 'https://graph.facebook.com/v2.6/me/messages?access_token=' . $access_token;
$ch  = curl_init($url);

// The message that will be sent

foreach ($json['items'] as &$value) {
    $links            = $value['link'];
    $message_to_reply = $links;
    $jsonData         = '{
    "recipient":{
        "id":"' . $sender . '"
    },
    "message":{

     "attachment":
          {
          "type":"image",
           "payload":
             {
                "url":"' . $message_to_reply . '"
             }
          }
    }
}';
    $jsonDataEncoded  = $jsonData;
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    if (!empty($input['entry'][0]['messaging'][0]['message'])) {
        $result = curl_exec($ch);
    }
    
}

$jsonDataEncoded = $jsonData;
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'
));
if (!empty($input['entry'][0]['messaging'][0]['message'])) {
    $result = curl_exec($ch);
}
/* 
 uncomment this after you add the host to the webhook.
 
 
echo "Hello, I am a chatbot."; // get request on /index.php


*/
