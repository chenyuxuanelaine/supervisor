@extends('Basic.sub_page')
@section('title', '后台管理')

@section('page_css')

@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                        File Administrate List
                    </div>
                    <div class="hidden-sm hidden-xs btn-group">
                        <a type="button" href="{{route('addUserForm')}}" class="btn btn-xs btn-success btn-bold">添加用户</a>
                    </div>

                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">
                                    <label class="pos-rel">
                                        <input type="checkbox" class="ace" />
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th>序号</th>
                                <th>用户名</th>
                                <th class="hidden-480">文件目录权限</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($list))
                                @foreach($list as $item)
                                    <tr id="{{$item['id']}}">
                                        <td class="center">
                                            <label class="pos-rel">
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#">{{$item['id']}}</a>
                                        </td>
                                        <td>{{$item['user_name']}}</td>
                                        <td>
                                            {{$item['privilege']}}
                                        </td>
                                        <td>
                                          {{$item['created_at']}}
                                        </td>
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">
                                                <a href="{{route('editUser', ['id'=>$item['id']])}}">
                                                    <button class="btn btn-xs btn-info">
                                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                    </button>
                                                </a>
                                                <a href="{{route('AdminIndex', ['id'=>$item['id']])}}">
                                                    <button class="btn btn-xs btn-danger btn-delete">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </button>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @endif
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
                            <font>
                                <font>总共有@if(!empty($list)){{$list->total()}}@endif条数据</font></font>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                            @if(!empty($list))
                                {{$list->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('js')
    <script>

    </script>

@endsection