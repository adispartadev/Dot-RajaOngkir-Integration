<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiKotaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUnAuthorizationError(): void
    {
        $this->json('GET', 'search/cities')
            ->assertStatus(401);
    }


    public function testSuccessGetCity() {
        $user = User::first();
        $this->actingAs($user)
            ->json('GET', 'search/cities?id=1')
            ->assertStatus(200);
    }


    public function testRequiredIdGetCity() {
        $user = User::first();
        $this->actingAs($user)
            ->json('GET', 'search/cities')
            ->assertStatus(200)
            ->assertJson([
                "status"  => "error",
                "message" => "Parameter ID harus diisi",
            ]);
    }


    public function testCityNotFound() {
        $user = User::first();
        $this->actingAs($user)
            ->json('GET', 'search/cities?id=abc')
            ->assertStatus(200)
            ->assertJson([
                "status"  => "error",
                "message" => "Kota tidak ditemukan",
            ]);
    }
}
