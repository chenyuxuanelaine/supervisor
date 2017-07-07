<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Admin Login Page</title>

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
                            <span class="white" id="id-text2">后台管理</span>
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

                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

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
    $('#login').on('click', function () {
        dosubmit();
    });

    $("body").keydown(function(event) {
        if (event.keyCode == 13) {
            dosubmit();
        }
    });
    //登录
    function dosubmit() {
        var name = $('#l-name').val();
        var pwd = $('#l-pwd').val();
        var is_checked = 0;//是否选中记住我
        if($('#remember').is(':checked')){
            is_checked = 1;
        }
        var item = {'user_name':name, 'password':pwd, 'is_checked':is_checked};
        console.log(item);
        $.ajax({
            url:'{{route('AdminSubmit')}}',
            data:item,
            type:'post',
            success:function (res) {
//                console.log(res);
                if(res.code == 1000){
                    alert('登录成功');
                    location.href = '{{route('AdminIndex')}}';
                }else{
                    alert(res.msg);
                }
            }
        });
    }

</script>
</body>
</html>
