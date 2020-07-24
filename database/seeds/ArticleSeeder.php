<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*\App\Models\Article::truncate();
        // 实例化
        $faker = \Faker\Factory::create();
        for($i=1;$i<=10;$i++){
            $data = [
                'uid'=>$i,
                'title'=>$faker->word,
                'desn'=>$faker->sentence,
                'cnt'=>$faker->text
            ];
            \App\Models\Article::create($data);
        }*/

        # 调用数据工厂
        factory(\App\Models\Article::class,20)->create();
    }
}
