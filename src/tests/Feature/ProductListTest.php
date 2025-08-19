<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class ProductListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function 全商品を取得できる()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        Product::factory()->count(3)->create();
        $response = $this->get('/product');
        $response->assertStatus(200);
        $response->assertSee(Product::first()->product_name);
    }
    /** @test */
    public function 購入済み商品は_Sold_と表示される()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $product = Product::factory()->create(['status'=>'sold']);
        $response = $this->get('/product');
        $response->assertStatus(200);
        $response->assertSee('SOLD');
    }
    /** @test */
    public function 自分が出品した商品は表示されない()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $myProduct = Product::factory()->create(['user_id'=>$user->id]);
        $response = $this->get('/product');
        $response->assertStatus(200);
        $response->assertDontSee($myProduct->product_name);
    }
}
