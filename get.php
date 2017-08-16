<?php
$appId = 'wxd863176f873f6e90';
$appSecret = '2af86337b61b664090e35214c82c6df9';
$noncestr = 'Wm3WZYTPz0wzccnW';
$timestamp = time();
$url = $_POST['URL'];


// 获取Token
$getTokenURL = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appId.'&secret='.$appSecret;
$tokenResponse = file_get_contents($getTokenURL);
// $tokenResponse = '';
$token = json_decode($tokenResponse, true)['access_token'];


// 获取JS API Ticket
$getJSapiTicket = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$token.'&type=jsapi';
$ticketResponse = file_get_contents($getJSapiTicket);
$jsapi_ticket = json_decode($ticketResponse, true)['ticket'];
// $ticketResponse = '';
// $jsapi_ticket = '';


// 拼接签名
$fit = 'jsapi_ticket='.$jsapi_ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url='.$url;
$signature = sha1($fit);


echo json_encode(array(
    'appSecret' => $appSecret,
    'url' => $url,
    'token' => $token,
    'ticket' => $jsapi_ticket,

    'appId' => $appId,
    'timestamp' => $timestamp,
    'nonceStr' => $noncestr,
    'signature' => $signature
));

