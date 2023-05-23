<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index()
    {
        $response = Http::prepr([
            'query' => 'get-articles'
        ]);

        return view('pages.blog.index', [
            'articles' => data_get($response->json(), 'data.Articles'),
        ]);
    }

    public function show(string $slug)
    {
        $response = Http::prepr([
            'query' => 'get-article-detail',
            'variables' => [
                'slug' => $slug,
            ]
        ]);

        if(data_get($response->json(), 'data.Article')) {
            return view('pages.blog.show', [
                'article' => data_get($response->json(), 'data.Article'),
            ]);
        }
        abort(404);
    }
}
