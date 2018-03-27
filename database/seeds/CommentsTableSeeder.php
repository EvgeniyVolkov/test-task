<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            ['email' => 'james@test.loc',
                'text' => 'Comment from James',
                'article_id' => 2],
            ['email' => 'bill@test.loc',
                'text' => 'Comment from Bill',
                'article_id' => 2],
            ['email' => 'test@test.loc',
                'text' => 'Test comment',
                'article_id' => 3],
        ]);
    }
}
