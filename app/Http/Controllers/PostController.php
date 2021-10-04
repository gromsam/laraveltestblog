<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Post::where('published', 1)->orderBy('created_at', 'desc')->paginate(12);

//        dd($posts);

        return view('home', [
            'articles' => $articles
        ]);

    }

    public function list(){

        $articles = Post::where('published', 1)->orderBy('created_at', 'desc')->paginate(12);

        $tags = Tag::all();

//        dd($posts);

        return view('articles', [
            'articles' => $articles,
            'tags' => $tags
        ]);

    }

    public function slug(Request $request){

        $article = Post::where('slug', $request->slug)->first();

//        dd($article);
//        dd($article->tags);

        if($article){
            return view('article', [
                'article' => $article
            ]);
        }else{
            abort(404);
        }

    }

    public function articlePlusLike(Request $request){

        if(isset($request->id)){

            $article = Post::select(['id', 'like'])->find($request->id);
            $article->like++;
            $article->save();

            return response()->json([
                'new_count_like' => $article->like
            ], 200);

        }

    }

    public function articlePlusView(Request $request){

        $article = Post::select(['id', 'view'])->find($request->id);
        $article->view++;
        $article->save();

        return response()->json([
            'new_count_view' => $article->view
        ], 200);

    }

    public function postsByTag(Request $request){

//        dd($request->slug);

        $tag = Tag::where('slug', $request->slug)->first();
        $tags = Tag::all();

        if(isset($tag) && $tag->posts){
            return view('articles', [
                'articles' => $tag->posts()->paginate(2),
                'tags' => $tags,
                't' => $tag
            ]);
        }else{
            abort(404);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
