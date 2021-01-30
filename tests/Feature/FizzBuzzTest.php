<?php

namespace Tests\Feature;

use Tests\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @test
     */
    public function welcome_page_test()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_fizz_buzz()
    {
        $response = $this->get('fizz-buzz');
        $array = [];
        for ($index = 1; $index <= 20; $index++) {
            $array[] = checkModulus($index);
        }
        $response->assertStatus(200);
    }
}
