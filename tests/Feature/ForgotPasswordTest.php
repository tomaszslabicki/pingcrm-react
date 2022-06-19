<?php

namespace Tests\Feature;

use App\Mail\HelloOnepilot;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();

        $account = Account::create(['name' => 'Acme Corporation']);

        $user = User::factory()->make([
            'account_id' => $account->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'owner' => true,
        ]);
        $user->save();
    }

    /**
     * @test
     * @return void
     */
    public function email_is_required()
    {
        $response = $this->post(route('forgot-password'), [
            'email' => ''
        ]);

        $response->assertSessionHasErrors(['email' => 'The email field is required.']);
    }

    /**
     * @test
     * @return void
     */
    public function email_is_valid()
    {
        $response = $this->post(route('forgot-password'), [
            'email' => 'john'
        ]);

        $response->assertSessionHasErrors(['email' => 'The email must be a valid email address.']);
    }

    /**
     * @test
     * @return void
     */
    public function email_is_exists()
    {
        $response = $this->post(route('forgot-password'), [
            'email' => 'john@example.com'
        ]);

        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']);
    }

    /**
     * @test
     * @return void
     */
    public function email_message_is_sent()
    {
        $this->post(route('forgot-password'), [
            'email' => 'johndoe@example.com'
        ]);

        Mail::assertSent(HelloOnepilot::class);
    }

    /**
     * @test
     * @return void
     */
    public function email_message_is_not_sent()
    {
        $this->post(route('forgot-password'), [
            'email' => 'tomasz@example.com'
        ]);

        Mail::assertNotSent(HelloOnepilot::class);
    }


}
