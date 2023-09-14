<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Database\Seeders\RoleSeeder;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function testEmailVerificationScreenCanBeRendered()
    {
        (new RoleSeeder())->run();
        $user = User::factory()->create(
            [
            'email_verified_at' => null,
            ]
        );

        $response = $this->actingAs($user)->get('/verify-email');

        $response->assertStatus(200);
    }

    public function testEmailCanBeVerified()
    {
        (new RoleSeeder())->run();
        $user = User::factory()->create(
            [
            'email_verified_at' => null,
            ]
        );

        Event::fake();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
    }

    public function testEmailIsNotVerifiedWithInvalidHash()
    {
        (new RoleSeeder())->run();
        $user = User::factory()->create(
            [
            'email_verified_at' => null,
            ]
        );

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($user)->get($verificationUrl);

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}
