<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiseFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_weather()
    {
        $response = $this->get('/api/weather?address=London');

        $response->assertStatus(200);
    }

    public function test_popular()
    {
        $response = $this->get('/api/weather/popular');

        $response->assertStatus(200);
    }

    public function test_results()
    {
        $response = $this->get('/api/weather/results?from=2021-01-01&to=2021-01-31');

        $response->assertStatus(200);
    }

    public function test_results2()
    {
        $response = $this->get('/api/weather/results?from=2021-01-01&to=2021-01-31&provider=OpenWeatherMap');

        $response->assertStatus(200);
    }

    public function test_results3()
    {
        $response = $this->get('/api/weather/results?from=2021-01-01&to=2021-01-31&provider=OpenWeatherMap&temperature=10');

        $response->assertStatus(200);
    }

    public function test_results4()
    {
        $response = $this->get('/api/weather/results?from=2021-01-01&to=2021-01-31&provider=OpenWeatherMap&temperature=10&wind_speed=10');

        $response->assertStatus(200);
    }

    // Popular addresses
    public function test_popular2()
    {
        $response = $this->get('/api/weather/popular');

        $response->assertStatus(200);
    }
}
