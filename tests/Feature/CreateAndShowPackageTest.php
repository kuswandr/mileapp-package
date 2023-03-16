<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CreateAndShowPackageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCreateNotCompleteDataPackage()
    {
        $this->withoutMiddleware();
        $packageData = [
            "transaction_d" => Str::random(10),
            "company_name" => "YouTube",
        ];
        
        $this->json('POST', route('api.v1.package.create'), 
            $packageData, 
            [
                'Accept' => 'application/json',
            ]
        )
        ->assertStatus(422);
    }

    public function testCreateCompleteDataPackage()
    {
        $this->withoutMiddleware();
        $data = json_decode(file_get_contents("resources/package.json"), true);
        $data['transaction_id'] = Str::random(10);
        $response = $this->json('POST', route('api.v1.package.create'), $data, ['Accept' => 'application/json']);
        $response->assertStatus(201);
    }

    function testShowAllDataPackage()
    {
        $this->withoutMiddleware();
        $response = $this->json('GET', route('api.v1.package.list'));
        $response->assertStatus(200);
    }
}
