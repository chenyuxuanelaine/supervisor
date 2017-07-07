<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="IE=edge,Chrome=1" http-equiv="X-UA-Compatible">
    <meta content="webkit" name="renderer">
    <title>登录 - 文件管理</title>

    <link href="../../../home/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../../../home/css/icon.css" type="text/css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../../../home/css/default/common.css?v=20151125">
    <link type="text/css" rel="stylesheet" href="../../../home/css/default/link.css?v=20151125">
    <link type="text/css" rel="stylesheet" href="../../../home/js/plug_module/style.css?v=20151125">
    <link type="text/css" rel="stylesheet" href="../../../home/css/default/login.css?v=20151125">

    <script type="text/javascript" src="../../../home/js/jquery.2.js?v=20151125"></script>
    <script type="text/javascript" src="../../../home/js/jquery.form.js?v=20151125"></script>
    <script type="text/javascript" src="../../../home/js/plug_module/plug-in_module.js?v=20151125"></script>
    <script type="text/javascript" src="../../../home/js/aws.js?v=20151125"></script>
    <script type="text/javascript" src="../../../home/js/aw_template.js?v=20151125"></script>
    <script type="text/javascript" src="../../../home/js/app.js?v=20151125"></script>
    <script type="text/javascript" src="../../../home/js/md5.js?v=20151125"></script>
    <script src="../../../home/js/compatibility.js" type="text/javascript"></script>
    <!--[if lte IE 8]>
    <script type="text/javascript" src="../../../home/js/respond.js"></script>
    <![endif]-->
    <style type="text/css">.fancybox-margin{margin-right:17px;}</style>
</head>

<body>
<noscript id="noscript" unselectable="on">
    <div class="aw-404 aw-404-wrap container">
        <img src="../../../home/common/no-js.jpg">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>
<div id="wrapper">
    <div class="aw-login-box">
        <div class="mod-body clearfix">
            <div class="content pull-left">
                <h1 class="logo">
                    <a href=""></a>
                </h1>
                <h2 style="font-size:20px;color:lightblue;">文件管理</h2>
                <form>
                    <ul>
                        <li>
                            <input type="text" name="user_name" placeholder="用户名" class="form-control" id="aw-login-user-name"></li>
                        <li>
                            <input type="password" name="password" placeholder="密码" class="form-control" id="aw-login-user-password"></li>
                        <li class="alert alert-danger hide error_message"> <i class="icon icon-delete"></i> <em></em>
                        </li>
                        <li class="last">
                            {{--<input value="登录" class="pull-right btn btn-large btn-primary" id="login_submit">--}}
                            <button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="login_submit">
                                <i class="ace-icon fa fa-key"></i>
                                <span class="bigger-110">登录</span>
                            </button>
                            <label>
                                <input type="checkbox" id="remember">记住我
                            </label>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="side-bar pull-left"></div>
        </div>
    </div>
</div>
<script>
        //登录
        $('#login_submit').on('click', function () {
            dosubmit();
        });

        $("body").keydown(function(event) {
            if (event.keyCode == 13) {
                dosubmit();
            }
        });

        function dosubmit() {
            var name = $('#aw-login-user-name').val();
            var pwd = $('#aw-login-user-password').val();
            var is_checked = 0;//是否选中记住我
            if($('#remember').is(':checked')){
                is_checked = 1;
            }
            if(name == '' || pwd == ''){
                alert('请输入用户名或密码');
                return false;
            }
            var item = {'user_name':name, 'password':pwd, 'is_checked':is_checked};
            console.log(item);
            $.ajax({
                url:'{{route('submitlogin')}}',
                data:item,
                type:'post',
                success:function (res) {
//                console.log(res);
                    //判断是否为json格式的对象
                    var isjson = typeof(res) == "object" && Object.prototype.toString.call(res).toLowerCase() == "[object object]" && !res.length;
                    if(isjson){
                        alert(res.msg);
                    }else{
                        alert('登录成功');
                        location.href = '{{route('index')}}';
                    }
                }
            });
        }
</script>

</body>
</html>