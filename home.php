<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <script src="http://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <?php
        $appId = 'wxd863176f873f6e90';
        $appSecret = '2af86337b61b664090e35214c82c6df9';
        $noncestr = 'Wm3WZYTPz0wzccnW';
        $timestamp = time();
        $url = 'http://wx.mrsuper.top/home.php';
        $token = 'lGtuDNpGAMZQnFC5VqTCdA_KdO_esxhM1wusBCP7Z2yoq0ZPjbmRU-5diReIP1NNBTyESwjx8N7tJMIAqrdkY-NyONDyABTB_8zzKEsuZ_UNNFeAIAGGY';
        $jsapi_ticket = 'sM4AOVdWfPE4DxkXGEs8VObj4YPT20WnBsxcp-gWQj9JmMf3285BcrXnu1BdEx3Nsg11oTF--DR1JdAwF9lAyw';
        // 拼接签名
        $fit = 'jsapi_ticket='.$jsapi_ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url='.$url;
        $signature = sha1($fit);
    ?>

    <script>
        (function() {
            initWX({
                appId: '<?= $appId ?>',
                timestamp: <?= $timestamp ?>,
                nonceStr: '<?= $noncestr ?>',
                signature: '<?= $signature ?>'
            });
        }());

        function initWX(config) {
            wx.config({
                debug: true,
                appId: config.appId,
                timestamp: config.timestamp,
                nonceStr: config.nonceStr,
                signature: config.signature,
                jsApiList: ['hideAllNonBaseMenuItem']
            }); 

            wx.ready(function() {
                // 隐藏所有非基础按钮接口
                wx.hideAllNonBaseMenuItem();
            });
        }
    </script>
</body>
</html>


