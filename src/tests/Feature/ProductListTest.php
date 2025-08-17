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
        Product::factory()->count(3)->create();
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee(Product::first()->name);
    }
    /** @test */
    public function 購入済み商品は_Sold_と表示される()
    {
        $product = Product::factory()->create(['is_sold'=>true]);
        $response = $this->get('/products');
        $response->assertSee('sold');
    }
    /** @test */
    public function 自分が出品した商品は表示されない()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        Product::factory()->create(['user_id'=>$user->id]);
        $response = $this->get('/products');
        $response->assertDontSee($user->products()->first()->name);
    }
}
