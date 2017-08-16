<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎来到MR联盟</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <link href="https://cdn.bootcss.com/element-ui/1.3.5/theme-default/index.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
        }

        .imgSrc {
            width: 100%;
        }

        p {
            margin: 20px 0;
            padding: 0 20px;
        }

        el-button {
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <section id="app">
        <article>
            <p>
                <el-button type="success" @click="chooseImage()">选择图片</el-button>
                <el-button type="warning" @click="previewImage()">预览图片</el-button>
            </p>

            <p>
                <el-button type="danger" @click="startRecord()">开始录音</el-button>
                <el-button type="info" @click="stopRecord()">停止录音</el-button>
                <el-button type="success" @click="playVoice()">播放录音</el-button>
            </p>
        </article>

        <img class="test-img" :src="imgSrc">
    </section>

    <script src="https://cdn.bootcss.com/vue/2.3.3/vue.min.js"></script>
    <script src="https://cdn.bootcss.com/element-ui/1.3.5/index.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <?php
        $appId = 'wxd863176f873f6e90';
        $appSecret = '2af86337b61b664090e35214c82c6df9';
        $noncestr = 'Wm3WZYTPz0wzccnW';
        $timestamp = time();
        $url = 'http://wx.mrsuper.top/home.php';
        $token = 'wupO_ghY5_ssOFlc5a1bQy-3gG7mMZnfkNnlfs982H_OSGe0dk1hX1GT4_59XyX5YLOweJ0Y0bvLlxebQyoUbpg6ntBXM5RsfpLvsvESQZvV9-L9SfOJUqxePRoLSsAWURDaAGALIU';
        $jsapi_ticket = 'sM4AOVdWfPE4DxkXGEs8VObj4YPT20WnBsxcp-gWQj_ZDwSr9PWD9CoE8sjlRT8XTYifV3fgJ6jIfgZ-jZQcwg';
        $fit = 'jsapi_ticket='.$jsapi_ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url='.$url;
        $signature = sha1($fit);
    ?>

    <script>
        new Vue({
            beforeCreate: function() {
                initWX();
            },
            el: '#app',
            data: {
                imgSrc: '',
                record: ''
            },
            methods: {
                chooseImage: function() {
                    var that = this;
                    wx.chooseImage({
                        count: 4, // 默认9

                        // 可以指定是原图还是压缩图，默认二者都有
                        sizeType: ['original', 'compressed'],

                        // 可以指定来源是相册还是相机，默认二者都有
                        sourceType: ['album', 'camera'],
                        success: function (res) {
                            // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                            var localIds = res.localIds;
                            that.imgSrc = localIds;
                        }
                    }); 
                },

                previewImage: function() {
                    wx.previewImage({
                        current: 'http://pic.ffpic.com/files/2014/0513/0512hbstazsjbz1.jpg',
                        urls: [
                            'http://img.r1.market.hiapk.com/data/upload/software/2011/3/4/4a0502672bdc4e7d8ce845dcd1cfd7ef/e331efe1e611410bbce348a0f6b90af1.jpeg',
                            'http://img.r1.market.hiapk.com/data/upload/2011/10_21/56beb4909d6c4572a1d16a222d88bdd2.jpeg',
                            'http://pic.ffpic.com/files/2014/0513/0512hbstazsjbz1.jpg',
                            'http://img.r1.market.hiapk.com/data/upload/2014/01_14/23/201401142353362078.jpg'
                        ]
                    });
                },

                startRecord: function() {
                    wx.startRecord();
                },

                stopRecord: function(res) {
                    var that = this;
                    wx.stopRecord({
                        success: function(res) {
                            that.record = res.localId; 
                        }
                    });
                },

                playVoice: function() {
                    wx.playVoice({localId: this.record});
                }
            }
        });

        function initWX() {
            var isFial;

            wx.config({
                appId: '<?= $appId ?>',
                timestamp: <?= $timestamp ?>,
                nonceStr: '<?= $noncestr ?>',
                signature: '<?= $signature ?>',
                jsApiList: [
                    'hideOptionMenu',
                    'showMenuItems',
                    'chooseImage',
                    'previewImage',

                    'startRecord',
                    'stopRecord',
                    'playVoice'
                ]
            }); 

            // 失败
            wx.error(function(res) {
                alert('微信配置失败：' + res);
                isFial = true;
            });

            // 加载好运行(不论成功失败)
            wx.ready(function() {
                // 隐藏右上角菜单
                wx.hideOptionMenu();

                if (!isFial) {
                    wx.showMenuItems({
                        menuList: [
                            'menuItem:share:appMessage',
                            'menuItem:share:timeline',
                            'menuItem:share:qq',
                            'menuItem:share:QZone'
                        ]
                    });
                }
            });
        }
    </script>
</body>
</html>

