<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'user_id' => 1,
            'name' => 'テストユーザー',
            'image' => '',
            'postcode' => 2111122,
            'address' =>'テス都テスト区',
            'building' => 'サンプルビル212',
        ]);
    }
}
