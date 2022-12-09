<?php

namespace Tests\Feature;

use Database\Seeders\Question3Seeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Question3Test extends TestCase
{
    use RefreshDatabase;

    public function test_that_question_3_api_returns_sorted_and_filtered_data()
    {
        $this->seed(Question3Seeder::class);

        $response = $this->get('/api/question-3');

        $response->assertOk()->assertJsonCount(3, '*')->assertJsonStructure([
            [
                'id' => 'id',
                'foo' => 'foo',
                'bar' => 'bar',
                'baz' => 'baz',
            ],
        ])->assertJsonPath('0.id', 100)
        ->assertJsonPath('1.id', 99)
        ->assertJsonPath('2.id', 98);
    }
}
