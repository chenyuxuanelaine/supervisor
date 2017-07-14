@extends('Basic.sub_page')
@section('title', '文件管理--添加用户')

@section('page_css')
    <style>
        * {margin: 0px;padding: 0px;}
        #ceng{position:absolute;z-index:2;left:0;top:0;right:0;background-color:#ccc;filter:alpha(opacity=50);margin:1px 1px;display:none;width:100%;height:600px;text-align:center;}
        #close{position:absolute !important;left:30%;top:0px;z-index:3;border:1px solid #ccc;background-color:#fff;margin:100px auto;padding:0px;display:none;width:600px;height:500px;text-align:right;}
        .page{height:480px;overflow-y:auto;}
        .box{text-align:center;}
        #tbody-view tr{text-align:left;}
    </style>

@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><font><font class=""> 用户名 </font></font></label>
                    <div class="col-sm-9">
                        <input type="text" name="user_name" id="form-field-1" placeholder="user_name" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><font><font class=""> 密码 </font></font></label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="form-field-2" placeholder="password" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 control-label no-padding-right">
                        <button class="btn btn-small btn-primary" type="button" id="privilege" onclick="selPrivilege('/')">+分配权限</button>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="file" placeholder="select-file" class="col-xs-10 col-sm-5" style="height:40px;margin-top:8px;" value=""><br><br>
                    </div>
                    <div id="ceng">
                    </div>
                    <div id="close">
                        <a href="#" onclick="closeCeng()">关闭</a>
                        <div class="page" id="getFile" style="display:none;"><br>
                            @include('Admin.fileList')
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 control-label no-padding-right" ></div>
                    <div class="col-sm-9">
                        <div>
                            <button class="btn btn-info" type="button" id="btn-submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                提交
                            </button>
                            &nbsp;&nbsp;&nbsp;
                            <button class="btn" type="reset" id="btn-backList">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                返回列表
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.col -->
    </div>
@endsection

@section('js')
    <script>
        var last_file_name = '';
        $('#btn-backList').on('click', function () {
            window.location.href='{{route('AdminIndex')}}';
        });

//      获取文件的ajax
        function getFile(file_name) {
            $.ajax({
                url:'{{route('getFile')}}',
                type:'get',
                data:{'file_name':file_name},
                success:function (result) {
                    console.log(result);
                    if(result.code == 1000){
                        console.log(result.data);
                        //展示根目录
                        var data = result.data;
                        var htmlView = '';
                        if(file_name == '/'){
                            file_name = '';
                        }else{
                            last_file_name = file_name;
                        }
                        for(var i in data){
                            if(data[i] == '.'){
                                continue;
                            }
                            if(data[i] == '..'){
                                htmlView += '<tr><td><a href="#">'+data[i]+'</a></td></tr>';
                            }else{
                                htmlView += '<tr><td><a href="#">'+file_name+'/'+data[i]+'</a></td></tr>';
                            }
                        }
                        $('#tbody-view').html(htmlView);
                    }else{
                        alert(result.msg);
//                        alert('网络问题，请重试');
                    }
                }
            });
        }

        //'分配权限'按钮点击事件
        function selPrivilege(file_name) {
            getFile(file_name);
            $('#ceng').css('display', 'block');
            $('#close').css('display', 'block');
            $('.page').css('display', 'block');
            $("#getFile").css('display', 'block');
            return false;
        }
        function closeCeng() {
            $('#ceng').css('display', 'none');
            $('#close').css('display', 'none');
            return false;
        }
        var timer = null;
//        //监听弹层table单击事件
        $('#table-view').on('click','#tbody-view tr', function () {
            var tr = $(this);
            clearTimeout(timer);
            timer = setTimeout(function () {
                var txt = tr.text();
//                alert(txt);
                //获取用户选定的目录，放进文本框，并隐藏弹层
                if(txt == '..'){
                    //回到上一级目录
//                    alert(last_file_name);
                    var reg = /^.*\//;
                    var res = last_file_name.match(reg);
                    var str = JSON.stringify(res);
                    str = str.replace('["','');
                    //判断有多少个斜杠/
                    var num = str.match(/[\/]/g).length;
                    if(num == 1){
                        str = str.replace('"]','');
                    }else{
                        str = str.replace('/"]','');
                    }
//                    alert(str);
                    getFile(str);
                }else{
                    $("input[name='file']").val(txt);
                    closeCeng();
                }
            }, 300);
        });

        //监听弹层table双击事件
        $('#table-view').on('dblclick','#tbody-view tr', function () {
            clearTimeout(timer);
            var txt = $(this).text();
//            alert(txt);
            if(txt == '..'){
                //回到上一级目录
//                alert(last_file_name);
                var reg = /^.*\//;
                var res = last_file_name.match(reg);
//                alert(typeof(res));//obj
                var str = JSON.stringify(res);
                str = str.replace('["','');
                var num = str.match(/[\/]/g).length;
                if(num == 1){
                    str = str.replace('"]','');
                }else{
                    str = str.replace('/"]','');
                }
//                alert(str);
                getFile(str);
            }else{
                getFile(txt);
            }
        });

        $('#btn-submit').on('click', function () {
            var user_name = $('input[name="user_name"]').val();
            var password = $('input[name="password"]').val();
            var file = $('input[name="file"]').val();
            if(user_name == '' || password == '' || file == ''){
                alert('请填写完整');
                return false;
            }
            var through = 1;
            $.ajax({
                url:'{{route('verifyName')}}',
                type:'post',
                data:{'user_name':user_name},
                async:false,
                success:function (result) {
                    if(result.code != 1000){
                        alert(result.msg);
                        through = 0;
                    }
                }
            });
            if(through == 0){
                return false;
            }
            var data = {'user_name':user_name, 'password':password, 'privilege':file};
            console.log(data);
            var url = '{{route('addUser')}}';
            $.ajax({
                url:url,
                type:'post',
                data:data,
                success:function (result) {
                    console.log(result);
                    if(result.code == 1000){
                        alert('添加成功');
                        window.location.href='{{route('AdminIndex')}}';
                    }else{
                        alert(result.msg);
                    }
                }
            });
        });

    </script>
@endsection