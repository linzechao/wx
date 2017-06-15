<?php
$appId = 'wxd863176f873f6e90';
$appSecret = '2af86337b61b664090e35214c82c6df9';
$noncestr = 'Wm3WZYTPz0wzccnW';
$timestamp = time();
$url = 'http://wx.mrsuper.top';


// 获取Token
$token = '0vF0b_9ITyskCOyb8ane93GmHadq7osO9cVkymq9YYaoQo4upVLnPSCpJJC_YuK9-tZ_2F9h6u7mWshx4PGvZZgBqEXwY6sak_UqLNswyiHn8qYh7BJd4OrKq3maK4MYKISdAEASQA';


// 获取JS API Ticket
$jsapi_ticket = 'sM4AOVdWfPE4DxkXGEs8VObj4YPT20WnBsxcp-gWQj-IUila8rsaeH5jeCR-_R-Q9KtWMSd1DIXKtstizvZD4Q';


// 拼接签名
$fit = 'jsapi_ticket='.$jsapi_ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url='.$url;
$signature = sha1($fit);


echo json_encode(array(
    'appId' => $appId,
    'timestamp' => $timestamp,
    'nonceStr' => $noncestr,
    'signature' => $signature
));

