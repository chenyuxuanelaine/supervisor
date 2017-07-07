<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="active">
            <a href='/'>
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> 主页 </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{--@if($menu)--}}
        {{--@foreach($menu as $value)--}}
        {{--<li class="">--}}
            {{--<a href="#" class="dropdown-toggle">--}}
                {{--<i class="menu-icon fa fa-desktop"></i>--}}
                {{--<span class="menu-text">--}}
								{{--{{$value['title']}}--}}
							{{--</span>--}}

                {{--<b class="arrow fa fa-angle-down"></b>--}}
            {{--</a>--}}

            {{--<b class="arrow"></b>--}}

            {{--<ul class="submenu">--}}
                {{--@if($value['sub_second'])--}}
                {{--@foreach($value['sub_second'] as $item)--}}
                {{--<li class="">--}}
                    {{--<a href="#" class="dropdown-toggle">--}}
                        {{--<i class="menu-icon fa fa-caret-right"></i>--}}

                        {{--{{$item['title']}}--}}
                        {{--<b class="arrow fa fa-angle-down"></b>--}}
                    {{--</a>--}}

                    {{--<b class="arrow"></b>--}}

                    {{--<ul class="submenu">--}}
                        {{--@if($item['sub_three'])--}}
                        {{--@foreach($item['sub_three'] as $vo)--}}
                        {{--<li class="">--}}
                            {{--<a href="{{'/'.$vo['url']}}">--}}
                                {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                {{--{{$vo['title']}}--}}
                            {{--</a>--}}

                            {{--<b class="arrow"></b>--}}
                        {{--</li>--}}
                        {{--@endforeach--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--@endforeach--}}
                {{--@endif--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--@endforeach--}}
        {{--@endif--}}
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
