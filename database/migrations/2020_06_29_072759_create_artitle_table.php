<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200)->default('')->comment('标题');
            $table->string('desn',500)->default('')->comment('描述');
            $table->unsignedInteger('uid')->default(0)->comment('用户id');
            $table->text('cnt')->comment('文章内容');
            $table->char('ip',15)->default('')->commit('ip地址');
            $table->timestamps();
            // 删除标识
            $table->softDeletes();
        });

        /*Schema::create('cate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cname',200)->default('')->comment('标题');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * 如果表存在就删除
         */
        Schema::dropIfExists('article');
        // Schema::dropIfExists('cate');
    }
}
