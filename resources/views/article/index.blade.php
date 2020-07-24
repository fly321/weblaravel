<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文章列表</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.css">
</head>
<body>
<br>
<div class="container">
    <form action="" method="get" class="form-horizontal" role="form">

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">标题 :</label>
            <div class="col-sm-5">
                <input type="text" name="title" id="title" class="form-control" value="{{request()->get('title')}}">
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-default" >搜索结果</button>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>标题</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $obj)
                <tr>
                    <td>{{$obj->id}}</td>
                    <td>{{$obj->title}}</td>
                    <td>{{date('Y年m月d日',strtotime($obj->updated_at))}}</td>
                    <td>
                        <a href="##" class="btn btn-xs btn-primary">修改</a>
                        <a href="##" class="btn btn-xs btn-danger">删除</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">暂无数据</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="row">
            {{$data->appends(request()->except(['page']))->links()}}
        </div>

    </form>
</div>

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script>
    $('#title').click(function () {
        // $(this).select();
        $(this).trigger('select');
    });
</script>
</body>
</html>
