<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class forecast extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testForecast()
    {
        $this->visit("/api/forecast/Norway/Akershus/Bærum/Bærums_verk")
        ->see('Location: Bærums verk')
        ->dontSee('Location: Oslo');
    }
}
