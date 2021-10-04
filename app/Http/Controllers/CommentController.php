<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

//        $validated = $request->validate([
//            'subject' => 'required|max:255',
//            'body' => 'required',
//        ]);


        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()){

            return response()->json([
                'success' => false,
                'error' => $validator->errors()

            ], 200);

        }else{

            $post_id = (int) $request->post_id;
            $subject = trim($request->post_id);
            $body = trim($request->post_id);

            $comment = Comment::create([
                'post_id' => $post_id,
                'subject' => $request->subject,
                'body' => $request->body,
            ]);

            return response()->json([
                'success' => true,
                'comment' => $comment
            ], 200);

        }

        sleep(6);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
