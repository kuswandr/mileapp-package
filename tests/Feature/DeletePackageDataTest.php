<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeletePackageDataTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_for_delete_review_that_not_exist()
    {
        $this->withoutMiddleware();
        $transaction_id = random_int(100000, 999999);

        $this->json('DELETE', route('api.v1.package.delete',['id' => $transaction_id]))
            ->assertStatus(500)
            ->assertJson([
                'code' => 500,
                'message' => 'Data package not found',
            ]);
    }
}
