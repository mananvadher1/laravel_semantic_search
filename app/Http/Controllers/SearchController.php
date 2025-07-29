<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return view('search')->with('results', []);
        }

        // === STEP 1: Get Cohere embedding for the user query ===
        $response = Http::withToken(env('COHERE_API_KEY'))
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post('https://api.cohere.ai/v1/embed', [
                'model' => 'embed-english-v3.0',
                'texts' => [$query],
                'input_type' => 'search_query'
            ]);

        if (!$response->ok()) {
            return back()->withErrors(['API error: ' . $response->body()]);
        }

        $queryEmbedding = $response->json('embeddings')[0] ?? null;

        if (!$queryEmbedding) {
            return back()->withErrors(['Failed to generate embedding.']);
        }

        // === STEP 2: Compare with all categories stored in DB ===
        $categories = Category::all();
        $results = [];

        foreach ($categories as $category) {
            if (!$category->embedding) continue;

            $similarity = cosineSimilarity($queryEmbedding, $category->embedding);

            $results[] = [
                'category' => $category,
                'score' => $similarity
            ];
        }

        // Sort & return top 5 results
        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
        $topResults = array_slice($results, 0, 5);

        return view('search', [
            'results' => $topResults,
            'query' => $query
        ]);
    }
}
