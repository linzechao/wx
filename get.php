<?php
$appId = 'wxd863176f873f6e90';
$appSecret = '2af86337b61b664090e35214c82c6df9';
$noncestr = 'Wm3WZYTPz0wzccnW';
$timestamp = time();
$url = 'http://wx.mrsuper.top/index.html';


// 获取Token
/*
$getTokenURL = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appId.'&secret='.$appSecret;
$tokenResponse = file_get_contents($getTokenURL);
$token = json_decode($tokenResponse, true)['access_token'];
*/
$token = 'lGtuDNpGAMZQnFC5VqTCdA_KdO_esxhM1wusBCP7Z2yoq0ZPjbmRU-5diReIP1NNBTyESwjx8N7tJMIAqrdkY-NyONDyABTB_8zzKEsuZ_UNNFeAIAGGY';


// 获取JS API Ticket
/*
$getJSapiTicket = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$token.'&type=jsapi';
$ticketResponse = file_get_contents($getJSapiTicket);
$jsapi_ticket = json_decode($ticketResponse, true)['ticket'];
*/
$jsapi_ticket = 'sM4AOVdWfPE4DxkXGEs8VObj4YPT20WnBsxcp-gWQj9JmMf3285BcrXnu1BdEx3Nsg11oTF--DR1JdAwF9lAyw';


// 拼接签名
$fit = 'jsapi_ticket='.$jsapi_ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url='.$url;
$signature = sha1($fit);



echo json_encode(array(
    'appId' => $appId,
    'appSecret' => $appSecret,
    'token' => $token,
    'ticket' => $jsapi_ticket,
    'timestamp' => $timestamp,
    'nonceStr' => $noncestr,
    'signature' => $signature,
    'url' => $url
));
