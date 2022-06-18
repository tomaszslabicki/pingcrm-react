<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportsSeederTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function reports_seeder_seeds_correctly()
    {
        $this->artisan('db:seed');

        $this->assertDatabaseCount('reports', 50);
    }
}
