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

        // Generate embedding for query
        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/embeddings', [
                'model' => 'text-embedding-ada-002',
                'input' => $query,
            ]);

        $queryEmbedding = $response->json('data.0.embedding');

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

        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
        $topResults = array_slice($results, 0, 5);

        return view('search', [
            'results' => $topResults,
            'query' => $query
        ]);
    }
}
