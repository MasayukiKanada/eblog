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
                'thumnail' => '1.jpg',
                'for_user' => false,
                'is_visible' => true,
                'posted_at' => '2024-04-22 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト2',
                'body' => 'テスト2の投稿です。テスト2の投稿です。テスト2の投稿です。',
                'thumnail' => '2.jpg',
                'for_user' => false,
                'is_visible' => true,
                'posted_at' => '2024-04-23 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト3',
                'body' => 'テスト3の投稿です。テスト3の投稿です。テスト3の投稿です。',
                'thumnail' => '3.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-04-24 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト4',
                'body' => 'テスト4の投稿です。テスト4の投稿です。テスト4の投稿です。',
                'thumnail' => '4.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-04-25 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト5',
                'body' => 'テスト5の投稿です。テスト5の投稿です。テスト5の投稿です。',
                'thumnail' => '5.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-04-26 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト6',
                'body' => 'テスト6の投稿です。テスト6の投稿です。テスト6の投稿です。',
                'thumnail' => '6.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-04-27 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト7',
                'body' => 'テスト7の投稿です。テスト7の投稿です。テスト7の投稿です。',
                'thumnail' => '7.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-04-28 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト8',
                'body' => 'テスト8の投稿です。テスト8の投稿です。テスト8の投稿です。',
                'thumnail' => '8.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-04-29 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト9',
                'body' => 'テスト9の投稿です。テスト9の投稿です。テスト9の投稿です。',
                'thumnail' => '9.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-04-30 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト10',
                'body' => 'テスト10の投稿です。テスト10の投稿です。テスト10の投稿です。',
                'thumnail' => '10.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-05-01 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト11',
                'body' => 'テスト11の投稿です。テスト11の投稿です。テスト11の投稿です。',
                'thumnail' => '1.jpg',
                'for_user' => false,
                'is_visible' => true,
                'posted_at' => '2024-05-22 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト12',
                'body' => 'テスト12の投稿です。テスト12の投稿です。テスト12の投稿です。',
                'thumnail' => '2.jpg',
                'for_user' => false,
                'is_visible' => true,
                'posted_at' => '2024-05-23 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト13',
                'body' => 'テスト13の投稿です。テスト13の投稿です。テスト13の投稿です。',
                'thumnail' => '3.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-05-24 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト14',
                'body' => 'テスト14の投稿です。テスト14の投稿です。テスト14の投稿です。',
                'thumnail' => '4.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-05-25 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト15',
                'body' => 'テスト15の投稿です。テスト15の投稿です。テスト15の投稿です。',
                'thumnail' => '5.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-05-26 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト16',
                'body' => 'テスト16の投稿です。テスト16の投稿です。テスト16の投稿です。',
                'thumnail' => '6.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-05-27 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト17',
                'body' => 'テスト17の投稿です。テスト17の投稿です。テスト17の投稿です。',
                'thumnail' => '7.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-05-28 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト18',
                'body' => 'テスト18の投稿です。テスト18の投稿です。テスト18の投稿です。',
                'thumnail' => '8.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-05-29 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト19',
                'body' => 'テスト19の投稿です。テスト19の投稿です。テスト19の投稿です。',
                'thumnail' => '9.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-05-30 11:11:11'
            ],
            [
                'admin_id' => 1,
                'header' => 'テスト20',
                'body' => 'テスト20の投稿です。テスト20の投稿です。テスト20の投稿です。',
                'thumnail' => '10.jpg',
                'for_user' => true,
                'is_visible' => true,
                'posted_at' => '2024-06-01 11:11:11'
            ],
        ]);
    }
}
