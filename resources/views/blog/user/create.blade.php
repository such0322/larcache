@extends('layouts.blog')
@section('title', 'Page Title')
@section('content')
<!--<div class="col-sm-12">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="inputUsername" class="col-sm-4 control-label">账号</label>
            <div class="col-sm-4">
                <input type="email" class="form-control" id="inputUsername" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-4 control-label">密码</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputRePassword" class="col-sm-4 control-label">再次密码</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="inputRePassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-default">注册</button>
                <button type="reset" class="btn btn-default">取消</button>
            </div>
        </div>
    </form>
</div>-->
<script type="text/babel" src="{{asset("/js/blog/user/create.js")}}"></script>
@endsection