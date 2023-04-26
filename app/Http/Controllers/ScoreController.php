<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\PopularityRating;

class ScoreController extends Controller
{
    public function getScore(Request $request)
    {
        $term = $request->input('term');
        $rating = null;
        if(!$term) {

        }
        else {
            $rating = PopularityRating::where('word', $term)->first();
            if ($rating) {
                // Respond with the existing popularity rating
            } else {

                // Search for issues with the given term that contain "rocks"
                $positiveResponse = $this->searchIssues($term, 'rocks');

                // Search for issues with the given term that contain "sucks"
                $negativeResponse = $this->searchIssues($term, 'sucks');

                // Get the number of positive and negative results
                $positiveCount = $positiveResponse['total_count'];
                $negativeCount = $negativeResponse['total_count'];

                // Calculate the popularity score
                $totalCount = $positiveCount + $negativeCount;
                $score = $totalCount > 0 ? round(($positiveCount / $totalCount) * 10, 2) : 0;

                // Save to DB
                $rating = new PopularityRating;
                $rating->word = $term;
                $rating->positive_results = $positiveCount;
                $rating->negative_results = $negativeCount;
                $rating->popularity_rating = $score;
                $rating->save();
            }
        }


        // Return the score as a JSON response

        return response()->json([
            'term' => $rating->word,
            'score' => $rating->popularity_rating,
        ]);

        //return view('score', ['rating' => $rating]);
    }

    /**
     * Search for issues on GitHub using the given term and query.
     *
     * @param string $term
     * @param string $query
     * @return array
     */
    protected function searchIssues($term, $query)
    {
        $client = new Client([
            'base_uri' => 'https://api.github.com/',
            'headers' => [
                'Accept' => 'application/vnd.github+json',
                'Authorization' => 'Bearer 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',
                'X-GitHub-Api-Version' => '2022-11-28',
            ],
        ]);

        $response = $client->get('search/issues', [
            'query' => [
                'q' => $term . ' ' . $query,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
