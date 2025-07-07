<?php

namespace Database\Seeders;

use App\Models\ShippingAddress;
use Illuminate\Database\Seeder;

class ShippingAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingAddress::create([
            'user_id' => 1,
            'postcode' => 2611112,
            'address' => 'テス都テスト区テスト前',
            'building' => 'フラットテスト313',
        ]);
    }
}
