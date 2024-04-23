<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'admin_id' => 1,
                'header' => 'テスト1',
                'body' => 'テスト1の投稿です。テスト1の投稿です。テスト1の投稿です。',
                'thumnail' => '',
                'for_user' => false,
                'is_visible' => true,
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト2',
                'body' => 'テスト2の投稿です。テスト2の投稿です。テスト2の投稿です。',
                'thumnail' => '',
                'for_user' => false,
                'is_visible' => true,
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト3',
                'body' => 'テスト3の投稿です。テスト3の投稿です。テスト3の投稿です。',
                'thumnail' => '',
                'for_user' => true,
                'is_visible' => true,
            ],
        ]);
    }
}
