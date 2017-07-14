
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>@yield('title')</title>
        @yield('page_css')
    </head>

    <body>

        <div class="container">
            @yield('content')
        </div>

        <!-- <div id="footer">
            <a target="_blank" href="http://www.163.com/">网易首页</a>
            <a target="_blank" href="/.help/index.html">使用帮助</a>
            <a href="mailto:mirror@service.netease.com">联系我们</a>
            <a target="_blank" href="http://corp.163.com/eng/about/overview.html">About NetEase</a>
        </div> -->

        @yield('js')
    </body>
</html>
