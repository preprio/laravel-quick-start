<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        $response = Http::prepr([
            'query' => 'get-posts'
        ]);

        return view('pages.post.index', [
            'articles' => data_get($response->json(), 'data.Posts'),
        ]);
    }

    public function show(string $slug)
    {
        $response = Http::prepr([
            'query' => 'get-post-by-slug',
            'variables' => [
                'slug' => $slug,
            ]
        ]);

        if(data_get($response->json(), 'data.Post')) {
            return view('pages.post.show', [
                'post' => data_get($response->json(), 'data.Post'),
            ]);
        }
        abort(404);
    }
}