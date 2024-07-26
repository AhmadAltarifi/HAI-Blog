<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */

     public function search(Request $request)
     {
         $query = $request->input('query', '');

         $cacheKey = 'search_results_' . md5($query);

         $posts = Cache::remember($cacheKey, 3600, function () use ($query) {
             return Post::search($query)->get();
         });

         return response()->json($posts);
     }
    public function index()
    {
        //
        $posts = Post::all();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $post = $this->postRepository->create($data);
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
