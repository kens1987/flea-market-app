<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function 名前が入力されていない場合_バリデーションメッセージが表示される()
    {
        $formData = [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        $response = $this->post('/register',$formData);
        $response->assertSessionHasErrors(['name']);
        $this->assertEquals('お名前を入力してください',session('errors')->first('name'));
    }
    /** @test */
    public function メールアドレスが入力されていない場合_バリデーションメッセージが表示される()
    {
        $formData = [
            'name' => 'テスト',
            'email' => '',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        $response = $this->post('/register',$formData);
        $response->assertSessionHasErrors(['email']);
        $this->assertEquals('メールアドレスを入力してください',session('errors')->first('email'));
    }
    /** @test */
    public function パスワードが入力されていない場合_バリデーションメッセージが表示される()
    {
        $formData = [
            'name' => 'テスト',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => '',
        ];
        $response = $this->post('/register',$formData);
        $response->assertSessionHasErrors(['password']);
        $this->assertEquals('パスワードを入力してください',session('errors')->first('password'));
    }
    /** @test */
    public function パスワードが7文字以下の場合_バリデーションメッセージが表示される()
    {
        $formData = [
            'name' => 'テスト',
            'email' => 'test@example.com',
            'password' => 'pass123',
            'password_confirmation' => 'pass123',
        ];
        $response = $this->post('/register',$formData);
        $response->assertSessionHasErrors(['password']);
        $this->assertEquals('パスワードは８文字以上で入力してください',session('errors')->first('password'));
    }
    /** @test */
    public function パスワードが確認用パスワードと一致していない場合_バリデーションメッセージが表示される()
    {
        $formData = [
            'name' => 'テスト',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password',
        ];
        $response = $this->post('/register',$formData);
        $response->assertSessionHasErrors(['password']);
        $this->assertEquals('パスワードと一致しません',session('errors')->first('password'));
    }
    /** @test */
    public function 全ての項目が入力されている場合_会員情報が登録され_プロフィール設定画面に遷移()
    {
        $formData = [
            'name' => 'テスト',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        $response = $this->post('/register',$formData);
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users',[
            'name' => 'テスト',
            'email' => 'test@example.com',
        ]);
        $response->assertRedirect('/register/step2');
    }
}
