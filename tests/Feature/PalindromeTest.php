<?php

namespace Tests\Feature;

use Tests\TestCase;

class PalindromeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function visit_palindrome()
    {
        $response = $this->get('palindrome');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function check_palindrome()
    {
        $response1 = $this->post('check-palindrome', [
            'string' => 'madam',
        ]);
        $response1->assertOk();
        $response1->assertJson(['message' => 'The string is a palindrome']);
        $response2 = $this->post('check-palindrome', [
            'string' => 'No',
        ]);
        $response2->assertOk();
        $response2->assertJson(['message' => 'The string is not a palindrome']);
    }

    /**
     * @test
     */
    public function validate_input()
    {
        $response = $this->json('POST','check-palindrome', [
            '_token' => csrf_token(),
            'string' => '',
        ]);
        $response->assertStatus(422);
        $response->assertJson([
            'message'=>'The given data was invalid.',
            'errors'=>[
                'string'=>['Please enter a string to check palindrome']
            ]
        ]);
    }
}
