<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use DB;
class MydbController extends Controller
{
    public function db(){
        // 添加
        /*$sql = 'insert into la_users (username,password) values(:username,:password)';
        # 返回true/false
        // $ret = DB::insert($sql,[':username'=>'admin',':password'=>'admin888']);
        $ret = DB::insert($sql,['username'=>'admin1','password'=>'admin8881']);*/

        // 修改
        /*$sql = "update la_users set username=:username where id=:id";
        # 返回影响行数
        $ret =DB::update($sql,['username'=>'张三','id'=>1]);
        dd($ret);*/

        // 查询单条
        /*$sql = "select * from la_users where id=:id";
        # 返回一个集合对象
        $ret = DB::selectOne($sql,['id'=>1]);
        dump($ret);*/

        // 查询多条
        /*$sql = "select * from la_users";
        # 返回一个数组的集合
        $ret = DB::select($sql);
        dump($ret);*/

        // 删除
        $sql = "delete from la_users where id=:id";
        # 返回影响行数
        $ret = DB::delete($sql,['id'=>1]);
        dd($ret);
    }

    // db构建器
    public function db2(Request $request){
        # 查询所有
        // $ret = DB::table('users')->get();

        # 获取所有 只要一个字段
        // $ret = DB::table('users')->get(['username']);

        # 查询id大于等于3的记录
        // $ret = DB::table('users')->where('id','>=','3')->get();

        # id 大于等于 3 或者username=admin1
        // $ret = DB::table('users')->where('id','>=',3)->orWhere('username','admin1')->get();

        # 根据用户名查找
        // $kw = $request->get('kw','adm');
        // when                              字段 如果为真 就执行匿名函数
        /*$ret = DB::table('users')->when($kw,function(Builder $query) use ($kw){
            $query->where('username','like',"%{$kw}%");
        })->get();*/

        /*$ret = DB::table('users')->where(function (Builder $query) use ($kw){
            $query->where('username','like',"%{$kw}%");
        })->get();*/

        #id为3
        // $ret = DB::table('users')->where('id',3)->first();

        # 获取id为的用户名
        // $ret = DB::table('users')->where('id',3)->value('username');

        # 获取用户名这一列的数据
        // $ret = DB::table('users')->pluck('username','id');

        # 获取总数
        #$ret = DB::table('users')->where('id','>',2)->count();

        # 排序
        // $ret = DB::table('users')->orderBy('id','desc')->get();
        #分页
        // $ret = DB::table('users')->orderBy('id','desc')->offset(0)->limit(2)->get();

        // $ret = DB::table('users')->whereIn('id',[2,3,4])->get();
        // $ret = DB::table('users')->whereBetween('id',[2,4])->get();

        // 添加数据
        $table = DB::table('users');

        /*$ret = $table->insert([
            'username'=>'admin12',
            'password'=>'fusk'
        ]);*/

        // 添加多条
        /*$data = [];
        for ($i=6;$i<10;$i++):
        $data[] = [
          'username'=>'user'.$i,
          'password'=>'user'.$i,
        ];
        endfor;
        $ret = $table->insert($data);*/

        // 添加单条并返回插入时候的id
        /*$ret = $table->insertGetId([
            'username'=>'user10',
            'password'=>'user10'
        ]);*/

        // 修改
        /*$ret = $table->where('id',10)->update([
            'username'=>'user111',
            'password'=>'user111'
        ]);*/

        // 删除
        $ret = $table->delete(10);
        dump($ret);
    }

    // 模型操作
    public function mdb(){
        # 添加

        # 方案1
        /*$model = new Article();
        $model->uid = 1;
        $model->title = '我就是一条记录';
        $model->cnt ='你好世界';
        $model->save();
        dump($model);
        dump(get_class_methods($model));*/

        # 方案2
        /*$data = [
            'uid'=>2,
            'title'=>'php',
            'cnt'=>'php是世界上最好的语言'
        ];
        $data2 = [
            [
                'uid'=>3,
                'title'=>'php',
                'cnt'=>'php是世界上最好的语言'
            ],
            [
                'uid'=>4,
                'title'=>'php',
                'cnt'=>'php是世界上最好的语言'
            ]
        ];*/
        # 返回布尔值 可以插入单条或者多条
        // dump(Article::insert($data2));
        // dump(get_class_methods(Article::class));

        # 方案3
        /*$data = [
            'uid'=>2,
            'title'=>'php',
            'cnt'=>'php是世界上最好的语言'
        ];
        dump(Article::created($data));*/

        # 查询
        // 查单条

        // $ret = Article::where('id',1)->first();
        // $ret = Article::find(1);
        // dump($ret->toArray());


        // 查询多条
        // $ret = Article::all();
        // $ret = Article::where('id','>',1)->get();

        // 查询指定字段值
        // $ret = Article::where('id',1)->value('cnt');
        // 查询一列
        // $ret = Article::pluck('title','id');

        // 查询总记录数
        # $ret = Article::count();

        // 分页
        // $ret = Article::offset(0)->limit(2)->get();


        # 修改

        # fang an 1
        /*$model = Article::find(1);
        $model->title = '我就是来修改你';
        $model->save();*/

        # fang an 2
        /*$data = ['title'=>'马上就到了圣诞节'];
        $model = Article::where('id',1)->update($data);
        dump($model);*/

        # 删除
        /*$id = 1;
        $model = Article::find($id);
        dump($model->delete());*/
        // dump(Article::destroy(2));

        # 检索软删除
        // $ret = Article::get()->toArray();
        #$ret = Article::onlyTrashed()->get()->toarray();

        # 恢复id为2的记录的数据
        /*$model = Article::onlyTrashed()->where('id',2)->first();
        dump($model->restore());*/

        /*$data = [
            'uid'=>2,
            'title'=>'php',
            'cnt'=>'php是世界上最好的语言'
        ];
        // $data['ip'] = request()->ip();
        Article::create($data);*/
    }
}
