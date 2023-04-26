<?php

namespace Tests\Unit;
use App\Models\PopularityRating;

use Illuminate\Foundation\Testing\RefreshDatabase;


use Tests\TestCase;

class ScoreControllerTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {

        parent::setUp();
        // Add a sample PopularityRating instance to the database
        $rating = new PopularityRating;
        $rating->word = 'test';
        $rating->positive_results = 10;
        $rating->negative_results = 5;
        $rating->popularity_rating = 6.67;
        $rating->save();
    }
    public function testGetScore()
    {
        $response = $this->get('/score?term=test');

        $response->assertStatus(200)
            ->assertJson([
                'term' => 'test',
                'score' => 6.67,
            ]);
    }

    public function createApplication()
    {
        // TODO: Implement createApplication() method.
    }
}
