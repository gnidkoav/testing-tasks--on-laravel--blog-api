<?php

use Illuminate\Database\Seeder;


class ArticlesTableSeeder extends Seeder
{

    public function run()
    {
        factory(App\Article::class, 25)->create();
    }

}

