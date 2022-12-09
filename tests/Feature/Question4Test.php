<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class Question4Test extends TestCase
{
    public function test_that_form_is_accessible()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->get('/question-4');
        $response->assertOk();
    }

    public function test_valid_form()
    {
        $this->followingRedirects();
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 'bar',
            'bar' => '2023-01-01',
            'baz' => 0,
            'qux' => true
        ]);
        $response->assertSeeText('Created successfully.');
    }

    public function test_invalid_foo()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 'barrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr',
            'bar' => '2023-01-01',
            'baz' => 0,
            'qux' => true
        ]);
        $response->assertRedirect()->assertSessionHasErrors('foo');
    }

    public function test_invalid_bar()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 'bar',
            'bar' => 'xxx',
            'baz' => 0,
            'qux' => true
        ]);
        $response->assertRedirect()->assertSessionHasErrors('bar');
    }

    public function test_invalid_baz()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 'bar',
            'bar' => '2023-01-01',
            'baz' => -10,
            'qux' => true
        ]);
        $response->assertRedirect()->assertSessionHasErrors('baz');
    }

    public function test_invalid_baz2()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 'bar',
            'bar' => '2023-01-01',
            'baz' => 'x',
            'qux' => true
        ]);
        $response->assertRedirect()->assertSessionHasErrors('baz');
    }

    public function test_invalid_qux()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 'bar',
            'bar' => '2023-01-01',
            'baz' => 1,
            'qux' => 'x'
        ]);
        $response->assertRedirect()->assertSessionHasErrors('qux');
    }
}
