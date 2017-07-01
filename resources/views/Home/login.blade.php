<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Page</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="../../../assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../../../assets/css/ace.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../../assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="../../../assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../../assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="../../../assets/js/html5shiv.min.js"></script>
    <script src="../../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="ace-icon fa fa-leaf green"></i>
                            <span class="red"></span>
                            <span class="white" id="id-text2">文件管理</span>
                        </h1>
                        <h4 class="blue" id="id-company-text">&copy; Company Name</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        请登录你的账号
                                    </h4>

                                    <div class="space-6"></div>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="用户名" id="l-name"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="密码" id="l-pwd"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" id="remember"/>
                                                    <span class="lbl"> 记住我</span>
                                                </label>

                                                <button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="login">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">登录</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>


                                </div><!-- /.widget-main -->

                                <div class="toolbar clearfix">
                                    <div>
                                        <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            忘记密码？
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" data-target="#signup-box" class="user-signup-link">
                                            注册
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

                        <div id="forgot-box" class="forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-key"></i>
                                        找回密码
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        请输入手机号
                                    </p>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="phone" class="form-control" placeholder="手机号" id="find-back"/>
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="重新设置密码 6-10位字母、数字组合" id="f-pwd"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="确认密码" id="rf-pwd"/>
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                            </label>

                                            <div class="clearfix">
                                                <button type="button" class="width-35 pull-right btn btn-sm btn-danger" id="verify">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">验证</span>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /.widget-main -->

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        返回登录页
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.forgot-box -->

                        <div id="signup-box" class="signup-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header green lighter bigger">
                                        <i class="ace-icon fa fa-users blue"></i>
                                        新用户注册
                                    </h4>

                                    <div class="space-6"></div>

                                    <form>
                                        <fieldset>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="手机号" id="r-phone"/>
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="真实姓名" id="r-name"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="密码由6-10位字母、数字组合" id="r-pwd"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="确认密码" id="rr-pwd"/>
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                            </label>

                                            <div class="space-24"></div>

                                            <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">重置</span>
                                                </button>

                                                <button type="button" class="width-65 pull-right btn btn-sm btn-success" id="register">
                                                    <span class="bigger-110">注册</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        返回登录页
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.signup-box -->
                    </div><!-- /.position-relative -->

                    <div class="navbar-fixed-top align-right">
                        <br />
                        &nbsp;
                        <a id="btn-login-dark" href="#">Dark</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-blur" href="#">Blur</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-light" href="#">Light</a>
                        &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="../../../assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="../../../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='../../../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        $(document).on('click', '.toolbar a[data-target]', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
        });
    });

    //you don't need this, just used for changing background
    jQuery(function($) {
        $('#btn-login-dark').on('click', function(e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function(e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function(e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });

    //注册
    $('#register').on('click', function () {
        //验证信息
        var phone = $("#r-phone").val();
        var name = $("#r-name").val();
        var pwd = $("#r-pwd").val();
        var repeat_pwd = $("#rr-pwd").val();
        //验证手机号
        var phoneReg = /^1[34578]\d{9}$/;
        var bChk = phoneReg.test(phone);
        if(!bChk){
            alert('请输入正确的手机格式');
            return false;
        }
        //验证手机的唯一性
        $.ajax({
            url:'{{route('verrifyPhone')}}',
            data:{'phone':phone},
            type:'post',
            async:false,
            success:function (res) {
//                console.log(res);
                if(res.code != 1000){
                    alert('手机号已存在');
                    return false;
                }
            }
        });

        var nameReg = /[\u4e00-\u9fa5]/;
        var nameRes = nameReg.test(name);
        if(!nameRes){
            alert('用户姓名需为中文');
            return false;
        }

        var pwdReg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,10}$/;
        var pwdRes = pwdReg.test(pwd);
        if(!pwdRes){
            alert('密码需由6位数字、字母组合');
            return false;
        }
        if(pwd != repeat_pwd){
            alert('两次输入的密码不一致');
            return false;
        }

        var item = {'account':phone, 'user_name':name, 'password':pwd};
        console.log(item);
        $.ajax({
           url:'{{route('register')}}',
           data:item,
           type:'post',
           success:function (res) {
               console.log(res);
                if(res.code == 1000){
                    alert('您已注册成功，请登录');
                    //登录页
                    location.href = '{{route('loadlogin')}}';
                }
           }
        });
    });

    $('#remember').on('click', function () {

    });

    //登录
    $('#login').on('click', function () {
        var name = $('#l-name').val();
        var pwd = $('#l-pwd').val();
        var is_checked = 0;//是否选中记住我
        if($('#remember').is(':checked')){
            is_checked = 1;
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

    });

    //找回密码
    $('#verify').on('click', function () {
        var phone = $('#find-back').val();
        var pwd = $("#f-pwd").val();
        var repeat_pwd = $("#rf-pwd").val();
        //验证手机号
        var phoneReg = /^1[34578]\d{9}$/;
        var bChk = phoneReg.test(phone);
        if(!bChk){
            alert('请输入正确的手机格式');
            return false;
        }
        //验证手机是否已注册
        $.ajax({
            url:'{{route('verrifyPhone')}}',
            data:{'phone':phone},
            type:'post',
            async:false,
            success:function (res) {
//                console.log(res);
                if(res.code == 1000){
                    alert('验证失败，手机还未注册');
                    return false;
                }
            }
        });
        var pwdReg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,10}$/;
        var pwdRes = pwdReg.test(pwd);
        if(!pwdRes){
            alert('密码需由6位数字、字母组合');
            return false;
        }
        if(pwd != repeat_pwd){
            alert('两次输入的密码不一致');
            return false;
        }
        var data = {'account':phone, 'password':pwd};
        console.log(data);
        $.ajax({
            url:'{{route('resetPwd')}}',
            data:data,
            type:'post',
            success:function (res) {
//                console.log(res);
                if(res.code == 1000){
                    alert('密码已重新设置，请登录');
                    location.href = '{{route('loadlogin')}}';
                }else{
                    alert(res.msg);
                }
            }
        });
    });
</script>
</body>
</html>
