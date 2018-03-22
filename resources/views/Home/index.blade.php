@extends('Home.basic_page')
@section('title', '欢迎访问')

@section('page_css')
    <style>

    </style>

@endsection

@section('content')
    <h1 style="color:blue;">欢迎访问</h1>
    <table id="table-view" class="table table-striped table-hover table-condensed">
        <thead>
        <tr>
            <th>
                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                文件名
            </th>
            <th>
                <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                操作
            </th>
        </tr>
        </thead>
        <tbody id="tbody-view">
        <tr>
            <td>
                <a herf="#" style="cursor:pointer;">{{$list['privilege']}}</a>
            </td>
            <td>
                <a href="#" class="del"> 删除</a>
            </td>
        </tr>
        </tbody>
    </table>

    @include('Common.message_box')

@endsection

@section('js')
        <script type="text/javascript">
            var last_file_name = '';
            //监听弹层table双击事件
            $('#table-view').on('dblclick','#tbody-view tr', function () {
//        clearTimeout(timer);
                console.log($(this).children(":first-child"));
                var txt = $(this).children(":first-child").text().trim();
                console.log(txt);
                if(txt == '..'){
                    //回到上一级目录
                console.log(last_file_name);
                //如果last_file_name是等于'{{$list['privilege']}}',那就不能再返回到上一级，因为没有权限
                    if(last_file_name == '{{$list['privilege']}}'){
                        var htmlTxt = '<tr><td><a href="#">{{$list['privilege']}}</a></td><td><a href="#" class="del">删除</a></td></tr>';
                        $('#tbody-view').html(htmlTxt);
                    }else{
                        var reg = /^.*\//;
                        var res = last_file_name.match(reg);
//                alert(typeof(res));//obj
                        var str = JSON.stringify(res);
                        str = str.replace('["','');
                        var num = str.match(/[\/]/g).length;
                        console.log(num);
                        if(num == 1){
                            str = str.replace('"]','');
                        }else{
                            str = str.replace('/"]','');
                        }
                        console.log(str);
                        getFile(str);
                    }
                }else{
                    getFile(txt);
                }
            });

            //      获取文件的ajax
            function getFile(file_name) {
                $.ajax({
                    url:'{{route('getDirectory')}}',
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
                                    htmlView += '<tr><td colspan="2"><a href="#">'+data[i]+'</a></td></tr>';
                                }else{
                                    htmlView += '<tr><td><a href="#">'+file_name+'/'+data[i]+'</a></td><td><a href="#" class="del">删除</a></td></tr>';
                                }
                            }
                            $('#tbody-view').html(htmlView);
                        }else{
                            $('.msg-box-content .error-txt').text(result.msg);
                            $('.msg-box').css('display', 'table');
//                        alert('网络问题，请重试');
                        }
                    }
                });
            }

            $('#table-view').on('click','.del', function () {
                var txt = $(this).parent().prev().text().trim();
                console.log(txt);
                delFile(txt);
            });
            function delFile(file_name) {
                $.ajax({
                    url:'{{route('delFile')}}',
                    type:'get',
                    data:{'file_name':file_name},
                    success:function (result) {
                        console.log('del', result);
                        if(result.code == 1000){
                            window.location.reload();
                        }else{
                            $('.msg-box-content .error-txt').text('删除失败');
                            $('.msg-box').css('display', 'table');
                        }
                    }
                })
            }
    </script>
@endsection

