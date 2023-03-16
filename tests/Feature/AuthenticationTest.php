<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMustEnterEmailAndPassword()
    {
        $response = $this->json('POST', 'api/login');
        $response->assertStatus(422);
        $response->assertJson([
            "email" =>[
                "The email field is required."
            ],
            "password"=> [
                "The password field is required."
            ]
        ]);
    }

    public function testSuccessLogin()
    {
        $email = 'kuswandr@email.com';
        $password = '12345678';
        $payload = [
            'email' => $email,
            'password' => $password
        ];
        $response = $this->json('POST', 'api/login', $payload);
        $response->assertStatus(200);
        $res_array = (array)json_decode($response->content());

        $this->assertArrayHasKey('token', $res_array);

    }

}
