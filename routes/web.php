<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 路由控制器

# 前台登录 如果类在我们controllers根目录下面，就不用了加命名空间
# Route::get('login','LoginController@index')->name('login');

# zai controllers下面有目录中的控制器类，则定义的路由一定要加命名空间
# Route::get('admin/article/{id}','Admin\ArticleController@info')->name('admin.info');
# 分组简化命名空间
/*Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    Route::get('article/{id}','ArticleController@info')->name('admin.info');
});*/

Route::get('login','LoginController@login')->name('login');

Route::group(['prefix'=>'ads'],function(){
    Route::get('log/{id}',function($id){
        return $id;
    })->where(['id'=>'\d+']);
    Route::get('rog',function(){
        return 11;
    });
});

Route::get('login2','LoginController@login2')->name('login');

// 设置cookie
Route::get('ck',function (){
   // 设置cookie
    response('我设置了cookie')->cookie('name','zhangsan',5);
    #return redirect(route('getcks',['id']=>1));
    #return redirect()->route('getcks');
    #跳转带参数
    return redirect()->route('getcks',['id'=>1]);
    });

// 获取cookie
Route::get('getck',function (){
    return request()->cookie('name');
})->name('getcks');

// 返回一个json数据
Route::get('json',function (){
    // 参数 1 数组
    // 参数 2 Http状态码 默认200
    return response()->json(['id'=>1, 'name'=>'张三'],201);
});

// 视图
route::get('view','HtmlController@index')->name('view');
route::get('inc','HtmlController@inc')->name('inc');
route::get('inc2','HtmlController@inc2')->name('inc2');
route::get('html1','HtmlController@html1')->name('html1');

#添加用户界面
route::get('adduser','UserController@index')->name('user.adduser');
#添加用户处理
route::post('adduser','UserController@addSave')->name('user.adduser');



# 测试数据库是否连通
Route::get('pdo',function(){
    dump(\DB::connection());
    // dd(get_class_methods(\DB::connection()));
    dd(get_class_methods(\DB::connection()->getPdo()));
});

# DB操作原生sql
Route::get('db','MydbController@db');
Route::get('db2','MydbController@db2');

# 模型操作
Route::get('model','MydbController@mdb')->name('model');

# 文章列表
Route::get('art','ArticleController@index');

# session 操作 - 给指定路由注册中间件
// Route::get('sess','SessController@index')->name('sess')->middleware('checkuser');
Route::get('sess','SessController@index')->name('sess');

# 给路由分组注册中间件
/*Route::group(['middleware'=>['checkuser']],function (){
    Route::get('sess','SessController@index')->name('sess');
});*/





/*Route::get('/', function () {
    return view('welcome');
});*/

// get 无csrf验证
/*Route::get('/req',function (){
    return 'get请求';
});*/

// 以下3种有csrf验证
// post
/*Route::post('/req',function (){
    return 'post请求';
});
// put/patch
Route::put('/req',function (){
    return 'put请求';
});
// delete
Route::delete('/req',function (){
    return 'delete请求';
});*/

/*
//match 可以一次性写多个请求类型
Route::match(['get','post'],'/req',function(){
    // 打印方法
    dump($_SERVER);
});

//获取所有的请求类型 实际工作中 不推荐用此方法来写我们的路由
Route::any('/req',function (Request $request){
    return 1;
});*/


// 获取文章信息 必填参数
/*Route::get('article/{id}',function (int $id=1){
    return $id;
});*/

// 可选参数
/*Route::get('article/{id?}',function (int $id=1){
    return $id;
});*/

// 参数限制
/*Route::get('article/{id}',function (int $id=1){
    return $id;
})->where(['id'=>'\d+']);*/

/*Route::get('article/{id}',function ($id){
    return $id;
})->where(['id'=>'[0-9a-z]+']);*/

 // 路由别名
 // laravel一般用.来连接
/*Route::get('req',function (){
    return 'get请求';
})->name('index.req');

Route::get('req1',function (){
    # 用路由别名得到url地址
    return route('index.req');
});*/

/*
// 路由分组织路由前缀
Route::group(['prefix'=>'admin'],function ($route){
    $route::get('login',function (){
        return 11;
    });
    Route::get('logout',function (){
        return 22;
    });
    Route::group(['prefix'=>'index'],function (){
        Route::get('index',function (){
            return 33;
        });
        Route::get('welcome',function (){
            return 44;
        });
    });
});*/
