<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PRODUCT</title>

    <link href="/www/Public/default/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/www/Public/default/css/layout.css" rel="stylesheet">
    <link href="/www/Public/default/css/style.css" rel="stylesheet">
    <link href="/www/Public/default/select2/select2.css" rel="stylesheet">

    <link href="/www/Public/default/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/www/Public/default/bootstrap/js/bootstrap.js">

    <script src="/www/Public/default/jquery/jquery.min.js"></script>
    <script src="/www/Public/default/layer/layer.js" type="text/javascript"></script>
    <script src="/www/Public/default/global.js" type="text/javascript"></script>
    <script src="/www/Public/default/layui/layui.js" type="text/javascript"></script>
    <script src="/www/Public/default/select2/select2.min.js" type="text/javascript"></script>
    <script src="/www/Public/default/select2/zh-CN.js" type="text/javascript"></script>

    <style>
        .paging{overflow:hidden;margin:0;padding:0;}
        .paging a{float:left;display:block;overflow:hidden;margin:5px;padding:3px 8px; border:1px solid #CCC;}
        .paging a:hover{background-color:#333;color:#FFF;}
        .paging a.current{background-color:#333;color:#FFF;}
    </style>
</head>
<body>
<script>

</script>

    <div class="view-product">
        <form id="ff">
            <div class="info-center">
                <div class="manage-head">
                    <h6 class="padding-left manage-head-con">修改密码</h6>
                </div>

                <div class="offcial-table input-table table-margin clearfix ">
                    <div class="tr-th clearfix ">
                        <div class="th w100 padding-left-15">基本信息</div>
                    </div>
                    <div class="tr clearfix border-bottom padding-left-15">
                        <div class="td w33">登陆帐号：<span style="line-height:30px;">
                        <input type="text" style="width:320px" class="input"  id="username" name="username" readonly="true" value="<?php echo ($username); ?>"/>
                        </span></div>
                    </div>
                    <div class="tr clearfix border-bottom padding-left-15">
                        <div class="td w33">旧的密码：<span style="line-height:30px;">
                            <input type="password" class="input" style="width:320px;" id="oldpwd" name="oldpwd" placeholder="请输入旧密码"/></span></div>
                    </div>
                    <div class="tr clearfix border-bottom padding-left-15">
                        <div class="td w33">新的密码：<span style="line-height:30px;padding-left:5px;"><input type="password" placeholder="请输入新密码" style="width:320px" class="input" id="newpwd" name="newpwd"/></span></div>
                    </div>
                    <div class="tr clearfix border-bottom padding-left-15">
                        <div class="td w33">重复密码：<span style="line-height:30px;padding-left:5px;"><input type="password" placeholder="请重复新密码" style="width:320px" class="input" id="newpwd2" name="newpwd2"/></span></div>
                    </div>
                </div>

                <!--操作按钮 start-->
                <div class="text-center padding-top">
                    <div class="td w80">
                        <button type="button" class="button bg-blue inlib-product" id="sub">提交</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="javascript:history.go(-1)"><button type="button" class="button bg-gray inlib-product">返回</button></a>
                    </div>
                </div>
                <!--操作按钮 end -->

        </div>
        </form>
    </div>

    <script>
        var data,confirm,load,_this;

        $(function() {
            sub();
        })

        function sub() {
            $('body').on('click', '#sub', function() {
                _this = $(this);

                var username = '<?php echo ($username); ?>';
                var oldpwd = $('#oldpwd').val();
                var newpwd = $('#newpwd').val();
                var newpwd2 = $('#newpwd2').val();

                var err='';
                if(oldpwd==''||oldpwd=='undefined') err+='请输入旧密码；';
                if(newpwd==''||oldpwd=='undefined') err+='请输入新密码；';
                if(newpwd2==''||oldpwd=='undefined') err+='请输入重复新密码；';
                if(newpwd!=newpwd2||oldpwd=='undefined') err+='请输入相同的新密码；';
                
                if(err!=''){
                    msg(err);
                    return false;
                }else{
                    $.ajax({
                        type:'POST',
                        url:"<?php echo U('UpdatePWD');?>",
                        data:{
                            username:username,
                            oldpwd:oldpwd,
                            newpwd:newpwd,
                            newpwd2:newpwd2
                        },
                        dataType:'json',
                        success:function(obj) {
                            msg(obj.msg);
                            window.parent.location.href='<?php echo U("Pub/Login","","html",true);?>';
                            return false;
                        }
                    });
                }
                
            });
        }



    </script>


</body>
</html>