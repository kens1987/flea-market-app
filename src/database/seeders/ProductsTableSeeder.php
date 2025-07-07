<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => '腕時計',
            'price' => 15000,
            'brand_name' => 'Rolax',
            'product_description' => 'スタイリッシュなデザインのメンズ腕時計',
            'image' => 'Armani-Mens-Clock.jpg',
            'condition' => '良好',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => 'HDD',
            'price' => 5000,
            'brand_name' => '西芝',
            'product_description' => '高速で信頼性の高いハードディスク',
            'image' => 'HDD-Hard-Disk.jpg',
            'condition' => '目立った傷や汚れなし',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => '玉ねぎ３束',
            'price' => 300,
            'brand_name' => '',
            'product_description' => '新鮮な玉ねぎ3束のセット',
            'image' => 'iLoveIMG-d.jpg',
            'condition' => 'やや傷や汚れあり',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => '革靴',
            'price' => 4000,
            'brand_name' => '',
            'product_description' => 'クラシックなデザインの革靴',
            'image' => 'Leather-Shoes-Product-Photo.jpg',
            'condition' => '状態が悪い',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => 'ノートPC',
            'price' => 45000,
            'brand_name' => '',
            'product_description' => '高性能なノートパソコン',
            'image' => 'Living-Room-Laptop.jpg',
            'condition' => '良好',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => 'マイク',
            'price' => 8000,
            'brand_name' => '',
            'product_description' => '高音質のレコーディング用マイク',
            'image' => 'Music-Mic-4632231.jpg',
            'condition' => '目立った傷や汚れなし',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => 'ショルダーバッグ',
            'price' => 3500,
            'brand_name' => '',
            'product_description' => 'おしゃれなショルダーバック',
            'image' => 'Purse-fashion-pocket.jpg',
            'condition' => 'やや傷や汚れあり',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => 'タンブラー',
            'price' => 500,
            'brand_name' => '',
            'product_description' => '使いやすいタンブラー',
            'image' => 'Tumble-souvenir.jpg',
            'condition' => '状態が悪い',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => 'コーヒーミル',
            'price' => 4000,
            'brand_name' => 'Starbacks',
            'product_description' => '手動のコーヒーミル',
            'image' => 'Waitress-with-Coffee+Grinder.jpg',
            'condition' => '良好',
            'status' => 'listed',
        ]);
        Product::create([
            'user_id' => 1,
            'category_id' => rand(1,14),
            'product_name' => 'メイクセット',
            'price' => 2500,
            'brand_name' => '',
            'product_description' => '便利なメイクアップセット',
            'image' => '外出メイクアップセット.jpg',
            'condition' => '目立った傷や汚れなし',
            'status' => 'listed',
        ]);
    }
}
