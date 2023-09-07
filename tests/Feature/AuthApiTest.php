<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthApiTest extends TestCase
{

    public function testRequiredFieldForAuth(): void
    {
        $this->json('POST', 'login', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"  => "error",
                "message" => "Please fill out the form provided",
                "data"  => [
                    "email"    => ["The email field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);
    }


    public function testWrongCredential(): void
    {
        $userData = [
            "email" => "dummy@gmail.com",
            "password" => "admin",
        ];

        $this->json('POST', 'login', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"  => "error",
                "message" => "",
                "data"    => [
                    "password" => ["Wrong email and password combination"],
                ]
            ]);
    }

    public function testSuccessAuth(): void
    {

        $userData = [
            "email" => "dummy@gmail.com",
            "password" => "dummy",
        ];

        $this->json('POST', 'login', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"  => "success",
                "message" => "Login successfully",
            ])
            ->assertJsonStructure([
                "status",
                "message",
                "data" => [
                    "token",
                    "user" => [
                        "id",
                        "name",
                        "email",
                        "email_verified_at",
                        "created_at",
                        "updated_at",
                    ]
                ],
            ]);
    }
}
