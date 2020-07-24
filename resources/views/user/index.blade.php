<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加用户</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.css">
</head>
<body>
<br>
<div class="container">
{{--    错误提示--}}

    @if($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">添加用户</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('user.adduser')}}" method="post" class="form-horizontal" role="form">
                @csrf
{{--                {{csrf_field()}}--}}
{{--                {{csrf_token()}}--}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">账号:</label>
                    <div class="col-sm-6">
                        <input type="text" name="username" class="form-control" value="{{old('username')}}">
                    </div>
                    <div class="col-sm-4">
                        我就是一个提示
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">密码:</label>
                    <div class="col-sm-6">
                        <input type="text" name="password" class="form-control" value="">
                    </div>
                    <div class="col-sm-4">
                        我就是一个提示
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">确认密码:</label>
                    <div class="col-sm-6">
                        <input type="text" name="password_confirmation" class="form-control" value="">
                    </div>
                    <div class="col-sm-4">
                        我就是一个提示
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">邮箱:</label>
                    <div class="col-sm-6">
                        <input type="text" name="email" class="form-control" value="{{old('email')}}">
                    </div>
                    <div class="col-sm-4">
                        我就是一个提示
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">添加用户</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
</body>
</html>
