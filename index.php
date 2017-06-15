<?php
$appId = 'wxd863176f873f6e90';
$appSecret = '2af86337b61b664090e35214c82c6df9';
$noncestr = 'Wm3WZYTPz0wzccnW';
$timestamp = time();
$url = 'http://wx.mrsuper.top';


// 获取Token
$token = '-M-7DP7jUzJSq5gDr8UE6qTQGWllC9r7f3w7YUZuIXr7HzER6G5LiUOOiaHWIMDof3uflmKzIeXfa1faTLg3EAGQgJSa3vQRST620eWxNrsXEJbAEAPWB';


// 获取JS API Ticket
$jsapi_ticket = 'sM4AOVdWfPE4DxkXGEs8VObj4YPT20WnBsxcp-gWQj-4pQxl8B5OZAqvYMgeoF7rWY1NJVOQYIHA-4LvpFSnKw';


// 拼接签名
$fit = 'jsapi_ticket='.$jsapi_ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url='.$url;
$signature = sha1($fit);


echo json_encode(array(
    'appId' => $appId,
    'timestamp' => $timestamp,
    'nonceStr' => $noncestr,
    'signature' => $signature
));

