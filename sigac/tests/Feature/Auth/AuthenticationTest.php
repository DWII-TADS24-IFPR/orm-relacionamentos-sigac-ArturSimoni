<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_aluno_screen_can_be_rendered(): void
    {
        $response = $this->get('/login/aluno');

        $response->assertStatus(200);
    }

    public function test_aluno_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'role' => 'aluno',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login/aluno', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('painel.aluno'));
    }

    public function test_aluno_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'role' => 'aluno',
            'password' => bcrypt('password'),
        ]);

        $this->post('/login/aluno', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create([
            'role' => 'aluno',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
