<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我就一个视图</title>
    <script src="https://cdn.bootcss.com/vue/2.6.11/vue.js"></script>
</head>
<body>
    <h3>我就是一个视图文件</h3>
    <div id="app">
        <p>{{$data['id']}}</p>
        <p>{{$data['name']}}</p>
        {{--3元运算--}}
        <p>{{$data['age'] ?? '我是没有'}}</p>

        <p>{{$title}}<hr>{!! $title !!}</p>
        
        <p>
            <h3>原始输出</h3>
            @{{ title }}
        </p>
        <p>{{date('Y-m-d')}}</p>
        <p>
            <h3>条件判断</h3>
            @if($data['age'] <= 10)
                <h4>儿童</h4>
            @elseif($data['age']<=20)
                <h4>少年</h4>
            @elseif($data['age']<=40)
                <h4>挣工资</h4>
            @else
                <h4>养老</h4>
            @endif

        </p>
        <p>
            @foreach($list as $k => $v)
                <li>{{$v['title']}}</li>
            @endforeach
        </p>
                <p>
                    @forelse($lda as $k => $v)
                        <li>{{$v['t']}}</li>
                    @empty
                        <p>没有数据</p>
                    @endforelse
                </p>
    </div>
    <script>
        var app =  new Vue({
            el:'#app',
            data:{
                'title':'woshivue的原样输出'
            }
        });
    </script>
</body>
</html>
