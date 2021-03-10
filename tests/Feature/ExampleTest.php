<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Dictionary;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDictionary()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/dictionary');

        $words = Dictionary::where('user_id', $user->id)->latest()->get();
        
        $response->assertStatus(200)->assertJson([$words]);
    }
}
