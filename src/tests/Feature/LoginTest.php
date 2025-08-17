<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function メールアドレスが入力されていない場合_バリデーションメッセージが表示される()
    {
        $formData = [
            'email' => '',
            'password' => 'password123',
        ];
        $response = $this->post('/login',$formData);
        $response->assertSessionHasErrors(['email']);
        $this->assertEquals('メールアドレスを入力してください',session('errors')->first('email'));
    }
    /** @test */
    public function パスワードが入力されていない場合_バリデーションメッセージが表示される()
    {
        $formData = [
            'email' => 'test@example.com',
            'password' => '',
        ];
        $response = $this->post('/login',$formData);
        $response->assertSessionHasErrors(['password']);
        $this->assertEquals('パスワードを入力してください',session('errors')->first('password'));
    }
    /** @test */
    public function 入力情報が間違っている場合_バリデーションメッセージが表示される()
    {
        $formData = [
            'email' => 'test1@example.com',
            'password' => 'password1234',
        ];
        $response = $this->post('/login',$formData);
        $response->assertSessionHasErrors(['email']);
        $this->assertEquals('ログイン情報が登録されていません',session('errors')->first('email'));
    }
    /** @test */
    public function 正しい情報が入力された場合_ログイン処理が実行される()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $formData = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];
        $response = $this->post('/login',$formData);
        $response->assertSessionHasNoErrors();
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('product.list');
    }
}
