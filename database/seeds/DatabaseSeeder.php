<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 调用我们编写的种子文件
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        # 从上到下去执行
        $this->call(ArticleSeeder::class);
    }
}
