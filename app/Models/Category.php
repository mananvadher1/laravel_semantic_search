<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['main_category', 'sub_category', 'service', 'embedding'];
    protected $casts = ['embedding' => 'array'];

    public static function generateEmbedding($text)
    {
        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/embeddings', [
                'model' => 'text-embedding-ada-002',
                'input' => $text,
            ]);

        return $response->json('data.0.embedding');
    }
}
