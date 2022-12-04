<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationViewsTest extends TestCase
{
    public function testUserCanRenderHomePage()
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertViewIs('home');
    }

    public function testUserCanRenderCityReportPage()
    {
        $response = $this->get('/search?city=Legnica');

        $response->assertOk();
        $response->assertViewIs('cityReport');
    }
}
