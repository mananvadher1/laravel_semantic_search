<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['main_category', 'sub_category', 'service', 'embedding'];
    protected $casts = ['embedding' => 'array'];

    public static function generateEmbedding($text)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('COHERE_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.cohere.ai/v1/embed', [
            'model' => 'embed-english-v3.0',    // Valid model name
            'texts' => [$text],
            'input_type' => 'search_document', // Required by Cohere
        ]);

        if ($response->successful()) {
            return $response->json('embeddings.0');
        }

        // Log or throw error if embedding fails
        Log::error('Cohere embedding failed', ['response' => $response->body()]);
        return null;
    }
}
