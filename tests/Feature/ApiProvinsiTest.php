<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiProvinsiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testProvinceUnAuthorizationError(): void
    {
        $this->json('GET', 'search/provinces')
            ->assertStatus(401);
    }


    public function testSuccessGetProvince() {
        $user = User::first();
        $this->actingAs($user)
            ->json('GET', 'search/provinces?id=1')
            ->assertStatus(200);
    }


    public function testRequiredIdGetProvince() {
        $user = User::first();
        $this->actingAs($user)
            ->json('GET', 'search/provinces')
            ->assertStatus(200)
            ->assertJson([
                "status"  => "error",
                "message" => "Parameter ID harus diisi",
            ]);
    }


    public function testProvinceNotFound() {
        $user = User::first();
        $this->actingAs($user)
            ->json('GET', 'search/provinces?id=abc')
            ->assertStatus(200)
            ->assertJson([
                "status"  => "error",
                "message" => "Provinsi tidak ditemukan",
            ]);
    }
}
