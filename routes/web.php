<?php
use Illuminate\Support\Facades\Route;
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
# 缓存处理
Route::get('cache','MycacheController@index');
# 后台管理
Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){

    #登录显示
    Route::get('login','LoginController@index')->name('admin.login.login');
    # 登录处理
    Route::post('login','loginController@login')->name('admin.login.login');
});
# 上传文件功能
Route::get('up','FileController@index')->name('up');
Route::post('up','FileController@up')->name('up');

# 关联关系
Route::get('rel','RelController@one')->name('one');
