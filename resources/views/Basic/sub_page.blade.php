<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="../../../assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="../../../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../../../assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]-->
    <link rel="stylesheet" href="../../../assets/css/ace-ie.min.css" />

    <!--下拉框-->
    <link rel="stylesheet" href="../../../assets/css/chosen.min.css" />

    <!--[endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="../../../assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="../../../assets/js/html5shiv.min.js"></script>
    <script src="../../../assets/js/respond.min.js"></script>
    <![endif]-->
    @yield('page_css')
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href='/' class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    后台管理系统
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="../../../assets/images/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
									<small>Welcome</small>
                            {{$user_info['user_name'] or ''}}
								</span>

                        {{--<i class="ace-icon fa fa-caret-down"></i>--}}
                    </a>

                    {{--<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<i class="ace-icon fa fa-cog"></i>--}}
                    {{--Settings--}}
                            {{--</a>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<i class="ace-icon fa fa-user"></i>--}}
                                {{--Profile--}}
                            {{--</a>--}}
                        {{--</li>--}}

                        {{--<li class="divider"></li>--}}

                        {{--<li>--}}
                            {{--<a href='/Admin/Login/logout'>--}}
                                {{--<i class="ace-icon fa fa-power-off"></i>--}}
                                {{--Logout--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar  responsive ace-save-state">
        @include("Basic.sidebar")
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href='/'>Home</a>
                    </li>
                    <li class="active">@if(!empty($nav[0]['title'])){{$nav[0]['title']}}@endif</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>

                    <div class="ace-settings-box clearfix" id="ace-settings-box">
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                                <label class="lbl" for="ace-settings-add-container">
                                    Inside
                                    <b>.container</b>
                                </label>
                            </div>
                        </div><!-- /.pull-left -->

                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                            </div>
                        </div><!-- /.pull-left -->
                    </div><!-- /.ace-settings-box -->
                </div><!-- /.ace-settings-container -->

                <div class="page-header">
                    <h1>
                        @if(!empty($nav[0]['title'])){{$nav[0]['title']}}@endif
                        <small>
                            @if(!empty($nav[1]['title']))<i class="ace-icon fa fa-angle-double-right"></i>{{$nav[1]['title']}}@endif
                        </small>
                        <small>

                            @if(!empty($nav[2]['title']))<i class="ace-icon fa fa-angle-double-right"></i>{{$nav[2]['title']}}@endif
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                @yield('content')

            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


    <div class="footer">
        @include("Basic.footer")
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
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
<script src="../../../assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="../../../assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="../../../assets/js/jquery-ui.custom.min.js"></script>
<script src="../../../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../../../assets/js/jquery.easypiechart.min.js"></script>
<script src="../../../assets/js/jquery.sparkline.index.min.js"></script>
<script src="../../../assets/js/jquery.flot.min.js"></script>
<script src="../../../assets/js/jquery.flot.pie.min.js"></script>
<script src="../../../assets/js/jquery.flot.resize.min.js"></script>
<script src="../../../assets/js/bootstrap-tag.min.js"></script>
<script src="../../../assets/js/bootstrap-datepicker.min.js"></script>
<script src="../../../assets/js/jquery.raty.min.js"></script>
<script src="../../../assets/js/jquery.knob.min.js"></script>
<script src="../../../assets/js/chosen.jquery.min.js"></script>


<!-- ace scripts -->
<script src="../../../assets/js/ace-elements.min.js"></script>
<script src="../../../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        $('.easy-pie-chart.percentage').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size/10),
                animate: ace.vars['old_ie'] ? false : 1000,
                size: size
            });
        })

        $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html',
                    {
                        tagValuesAttribute:'data-values',
                        type: 'bar',
                        barColor: barColor ,
                        chartRangeMin:$(this).data('min') || 0
                    });
        });


        //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
        //but sometimes it brings up errors with normal resize event handlers
        $.resize.throttleWindow = false;


        /**
         we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
         so that's not needed actually.
         */



        //pie chart tooltip example
        var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
        var previousPoint = null;


        /////////////////////////////////////
        $(document).one('ajaxloadstart.page', function(e) {
            $tooltip.remove();
        });




        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
        }

        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d2.push([i, Math.cos(i)]);
        }

        var d3 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.2) {
            d3.push([i, Math.tan(i)]);
        }


        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }


        $('.dialogs,.comments').ace_scroll({
            size: 300
        });


        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if(ace.vars['touch'] && ace.vars['android']) {
            $('#tasks').on('touchstart', function(e){
                var li = $(e.target).closest('#tasks li');
                if(li.length == 0)return;
                var label = li.find('label.inline').get(0);
                if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
            });
        }

        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
            if(this.checked) $(this).closest('li').addClass('selected');
            else $(this).closest('li').removeClass('selected');
        });


        //show the dropdowns on top or bottom depending on window height and menu position
        $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
            var offset = $(this).offset();

            var $w = $(window)
            if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                $(this).addClass('dropup');
            else $(this).removeClass('dropup');
        });

    })
</script>

@yield('js')
</body>
</html>
