<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'flg' =>'0',

        ]);

        // userにダミーデータ追加
        \App\Models\User::create([
            'name' => 'ケアマネージャー',
            'email' => 'test2@example.com',
            'password' => bcrypt('password'),
            'flg' =>'1'
        ]);

        // calendar
        \App\Models\Calendar::create([
            'start_date' => '2024/12/10  0:00:00',
            'end_date' => '2024/12/10  1:00:00',
            'event_name' => 'テスト',
            'event_detail' => '担当者名、実施内容など',
            'user_id' => '1'
        ]);



        \App\Models\Test::create([
            'message' => '家族の体調がすぐれず、一日寝ていることが増えたが大丈夫か。',
            'user_id' => 1,
            'manager_message' => 'かかりつけ医に相談します。具体的な症状を教えてください。',

        ]);
        \App\Models\Test::create([
            'message' => '自力でできる行動が多いため、利用サービスの変更を相談したい。',
            'user_id' => 1,
            'manager_message' => 'コメント未入力',
        ]);

        \App\Models\Tag::create([
            'name' => '健康状態'
        ]);

        \App\Models\Tag::create([
            'name' => 'ADL（活動の基本的な動作）'
        ]);

        \App\Models\Tag::create([
            'name' => 'IADL（高度な日常生活動作）'
        ]);

        \App\Models\Tag::create([
            'name' => '排尿・排便'
        ]);

        \App\Models\Tag::create([
            'name' => '皮膚'
        ]);

        \App\Models\Tag::create([
            'name' => '口腔衛生'
        ]);

        \App\Models\Tag::create([
            'name' => '認知'
        ]);

        \App\Models\Tag::create([
            'name' => 'コミュニケーション能力'
        ]);

        \App\Models\Tag::create([
            'name' => '社会との関わり'
        ]);

        \App\Models\Tag::create([
            'name' => '問題行動'
        ]);

        \App\Models\Tag::create([
            'name' => '介護状況'
        ]);

        \App\Models\Tag::create([
            'name' => '居住環境'
        ]);

        \App\Models\Tag::create([
            'name' => '特別な状況(虐待等)'
        ]);

        \App\Models\Tag::create([
            'name' => 'その他'
        ]);

        // \App\Models\Order::create([
        //     'id' => '1'
        // ]);







    }
}
