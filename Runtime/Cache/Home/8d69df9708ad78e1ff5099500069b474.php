<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
            <title><?php echo (C("OS_NAME")); ?></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/www/Public/client/css/pintuer.css">
        <link rel="stylesheet" href="/www/Public/client/css/admin.css">
        <link rel="stylesheet" href="/www/Public/client/css/style.css">
        <script src="/www/Public/client/js/jquery.js"></script>
        <script src="/www/Public/client/js/pintuer.js"></script>
            <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
            
            <style type="text/css">
                html{ height: 100%; width: 100%; padding: 0; margin: 0;}
                    .loginbg{ padding: 0; margin: 0;width: 100%; height: 100%; background: url(/www/Public/default/images/lgbg.jpg) left top no-repeat; background-size: 100% 100%;
                    display: table;}
                    .loginWrap{ width: 100%; height: 100%; display: table-cell; vertical-align: middle; text-align: center;}
                    .formBox{ width: 562px; height: 729px; display: inline-block; overflow: hidden;}
                    .formBox img{ display: block; width: 100%;}
                    .sbg{ width: 100%; height: 561px; background:rgba(225,225,225,0.57);}
                    .formBox h2{ padding: 0; margin: 0 0 45px 0; width: 100%; height: 100px; line-height: 100px; font-weight: normal; font-size: 40px; color: #00c7e8; 
                    text-align: center; background:rgba(225,225,225,0.57); font-family:"苹方","microsoft yahei"; font-weight: bold;}
                    .fmItem{ box-sizing: border-box; width:486px; height: 80px; margin: 0 auto; margin-top: 25px; border-radius: 40px; overflow: hidden; padding: 0 0 0 96px;}
                    .fmItem input{ width: 100%; height: 100%; background:none; border:0;background:rgba(225,225,225,0); font-family:"苹方","microsoft yahei"; 
                    font-size: 26px; color: #313133; outline: none;}
                    .fmItem.bg1{background: url("/www/Public/default/images/loc1.png") 28px center no-repeat;background-color: #ffffff; }
                    .fmItem.bg2{background: url("/www/Public/default/images/loc2.png") 28px center no-repeat;background-color: #ffffff; }
                    .sbBnt{font-family:"苹方","microsoft yahei"; font-size: 36px; color: #fff; width:486px; height: 80px;border-radius: 40px; overflow: hidden;
                    text-align: center; outline: none; cursor: pointer; border: 0; background: #00c7e8; margin-top: 74px;
                    }
                    .sbBnt:hover{background: #00c2ef; }
                    .msg{ display: none; position: absolute;left:0;right:0; top:50%; margin-top: -95px; text-align: center; background: #444; z-index: 100; padding:80px 0;height:30px; color:#fff;line-height: 30px; font-size: 20px;}
            </style>
    </head>
    <body class="loginbg">
            <div class="loginWrap">
                <form id='loginform' method="post" action="<?php echo U('login');?>">
                    <div class="formBox">

                            <div class="sbg">
                                    <h2>好运兆后台登录系统</h2>
                                    <div class="fmItem bg1">
                                            <input type='text' id="account" name="account" class='form-text' autocomplete="false"  placeholder="User"/>
                                    </div>
                                    <div class="fmItem bg2">
                                            <input type='password' name="password" id="password" class='form-text' autocomplete="false" placeholder="Password"/>
                                    </div>
                                    <input type="button" class="sbBnt btn-submit submit" id="logbtn" value="登 录" />
                            </div>
                    </div>
                </form>
            </div>
        <div class="msg"></div>
            <script type="text/javascript" src="/www/Public/client/js/msgbox.js"></script>
            <script>
                $(function () {
                    // 登录
                    $('.submit').click(function () {
                        $.ajax({
                            cache: false,
                            type: "POST",
                            url: "<?php echo U('Home/Pub/login');?>",
                            data: $('#loginform').serialize(),
                            async: true,
                            success: function (data) {
//                            console.log(data);return false;
                                if (data.status) {
                                    msgload("登录中…");
                                    setTimeout(function () {
                                        msgok("登录成功…");
                                        location.href = "<?php echo U('Home/Index/index');?>";
                                    }, 2000);
                                } else {
                                    msgerr(data.info);
//                                $('#captcha').click();
                                }
                            },
                            error: function (request) {
                                msgerr("页面错误");
                            }
                        });
                    });
                });
            </script>



</body>
</html>