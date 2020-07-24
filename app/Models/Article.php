<?php

namespace App\Models;

use App\Observers\ArticleObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title 标题
 * @property string $desn 描述
 * @property int $uid 用户id
 * @property string $cnt 文章内容
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereDesn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    # 指定软删除的trait
    use SoftDeletes;
    # 指定删除的字段
    protected $dates = ['deleted_at'];

    # 事件
    protected  $dispatchesEvents = [
        'creating'=>ArticleObserver::class
    ];
    # 指定表名 - 不用写表前缀
    protected $table = 'article';
    # 指定主键
    protected $primaryKey = 'id';

    # 如果没有create_at和update_at 则需要指定模型不需要关联
    # false 不用管理 true管理，默认true
    public $timestamps = true;

    # 批量赋值 白名单$fillable - 黑名单$guarded
    # 允许 所有表中的字段可以添加数据
    protected $guarded = [];

    # 在模型启动时候 就会触发的方法和构造方法类似
    protected static function boot()
    {
        # 本模型                  模型对应的观察者类
        static::observe(ArticleObserver::class);
        parent::boot();
    }

}
