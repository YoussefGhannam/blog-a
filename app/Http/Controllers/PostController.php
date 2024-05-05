<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{

    public function index()
    {
        $hero_posts = Post::with('category')->inRandomOrder()->limit(5)->get();
        $trending_posts = Post::with('category')->orderBy('trend_score','desc')->limit(5)->get();
        $quick_posts = Post::orderBy('minutes','asc')->limit(5)->get();
        $older_posts = Post::orderBy('created_at','desc')->limit(6)->get();
        $popular_categories = Category::inRandomOrder()->limit(6)->get();


        return view('posts.index',
        [
            'hero_posts' => $hero_posts,
            'trending_posts' => $trending_posts,
            'quick_posts' => $quick_posts,
            'older_posts' => $older_posts,
            'popular_categories' => $popular_categories,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        $category_id = Category::pluck('id');
        return view('posts.create',['category' => $category_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create([
            'title' => $validated->title,
            'body' => $validated->body,
            'image' => $validated->image,
            'user_id' => $validated->user_id,
            'category_id' => $validated->category_id
        ]);

        $post->save();


        return to_route('posts.index')->with('status','Succeed');

    }

    /**
     * Display the specified resource.
     */
    public function show(String $title)
    {
        $post = Post::where('title', '=', $title)->first();
        $post->increment('trend_score');

        return view('posts.show' , ['post' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $validated = $request->validated();


        $post::update([
            'title' => $validated->title,
            'body' => $validated->body,
            'image' => $validated->image,
            'user_id' => $validated->user_id,
            'category_id' => $validated->category_id
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findorFail($id);
        $post->delete();
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search query
        $posts = Post::where('title', 'like', '%' . $query . '%')->get();

        return response()->json($posts);
    }
}

