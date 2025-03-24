<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index()
    {
        $response = Http::prepr([
            'query' => 'get-posts'
        ]);

        return view('pages.blog.index', [
            'articles' => data_get($response->json(), 'data.Posts'),
        ]);
    }

    public function show(string $slug)
    {
        $response = Http::prepr([
            'query' => 'get-post-detail',
            'variables' => [
                'slug' => $slug,
            ]
        ]);

        if(data_get($response->json(), 'data.Post')) {
            return view('pages.blog.show', [
                'article' => data_get($response->json(), 'data.Post'),
            ]);
        }
        abort(404);
    }
}