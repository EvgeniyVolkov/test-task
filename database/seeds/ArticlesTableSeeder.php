<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            ['title' => 'Article 1',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? 
                Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus 
                possimus, veniam magni quis!'],
            ['title' => 'Article 2',
                'text' => 'Text 2'],
            ['title' => 'Article 3',
                'text' => 'Text 3'],
        ]);
    }
}
