<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文件上传</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-size: 14px;
        }
        .box{
            width: 800px;
            margin: 10px auto;
            /*text-align: center;*/
            /*background-color: #ccc;*/
        }
    </style>
</head>
<body>
<div class="box">
    <form target="uppic" method="post" action="{{route('up')}}" enctype="multipart/form-data">
        @csrf
        <p>
            <input type="file" name="pic" id="">
        </p>
        <p>
            <input type="submit" value="文件上传">
        </p>
    </form>
    <img src="##" alt="" id="img" style="width: 100px;">
</div>
<iframe src="" frameborder="0" name="uppic"></iframe>
</body>
</html>
