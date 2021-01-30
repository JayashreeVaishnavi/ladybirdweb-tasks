<?php

namespace Tests\Feature;

use Tests\TestCase;

class BrokenEggTest extends TestCase
{
    /**
     * @test
     */
    public function visit_broken_egg()
    {
        $response = $this->get('/broken-egg');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function check_minimum_attempts()
    {
        $response = $this->post('broken-eggs', [
            'eggs_count' => 2,
            'floors_count' => 10,
        ]);
        $minimumAttempts = minimumAttempts(2, 10);
        $response->assertOk();
        $response->assertJson(['number_of_attempts' => $minimumAttempts]);
    }

    /**
     * @test
     */
    public function validate_broken_eggs_input()
    {
        $response1 = $this->json('POST', 'broken-eggs', [
            '_token' => csrf_token(),
            'eggs_count' => '',
            'floors_count' => '',
        ]);
        $response1->assertStatus(422);
        $response1->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'eggs_count' => ['Please enter a valid number of eggs'],
                'floors_count' => ['Please enter a valid number of floors'],
            ],
        ]);
        $response2 = $this->json('POST', 'broken-eggs', [
            '_token' => csrf_token(),
            'eggs_count' => 'test',
            'floors_count' => 'test',
        ]);
        $response2->assertStatus(422);
        $response2->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'eggs_count' => ['Please enter a valid number of eggs'],
                'floors_count' => ['Please enter a valid number of floors'],
            ],
        ]);
    }
}
