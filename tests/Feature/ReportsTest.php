<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\Assert;
use Inertia\Testing\Concerns\Has;
use Tests\TestCase;

class ReportsTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $report = Report::create([
            'title' => 'Some title',
            'description' => 'A very interesting report',
            'date' => date('Y-d-m'
        )]);

        $account = Account::create(['name' => 'Acme Corporation']);
        $this->user = new User([
            'account_id' => $account->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'owner' => true,
        ]);
    }

    /**
     * @test
     * @return void
     */
    public function reports_index_routing_is_ok()
    {
        $response = $this->actingAs($this->user)->get('/reports');

        $response->assertOk();
    }

    /**
     * @test
     * @return void
     */
    public function view_is_well_rendered()
    {
        $response = $this->actingAs($this->user)->get('/reports');

        $response->assertViewIs('app');
    }

    /**
     * @test
     * @return void
     */
    public function session_has_no_errors()
    {
        $response = $this->actingAs($this->user)->get('/reports');

        $response->assertSessionHasNoErrors();
    }

    /**
     * @test
     * @return void
     */
    public function response_is_valid_inertia_response()
    {
        $response = $this->actingAs($this->user)->get('/reports');

        Assert::fromTestResponse($response);
    }
}
