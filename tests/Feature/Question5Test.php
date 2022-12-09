<?php

namespace Tests\Feature;

use Tests\TestCase;

class Question5Test extends TestCase
{
    public function test_that_view_5a_is_returned()
    {
        $response = $this->get('/question-5');
        $response->assertOk()->assertViewIs('questions.5a')->assertSeeText('Question 5a');

        $response = $this->get('/question-5?alt=');
        $response->assertOk()->assertViewIs('questions.5a');

        $response = $this->get('/question-5?alt=0');
        $response->assertOk()->assertViewIs('questions.5a');
    }

    public function test_that_view_5b_is_returned()
    {
        $response = $this->get('/question-5?alt=1');
        $response->assertOk()->assertViewIs('questions.5b')->assertSeeText('Question 5b');
    }
}
