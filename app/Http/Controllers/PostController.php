<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::orderByDesc('created_at')->get();
        if ($posts) {
            return $posts;
        } else {
            return response()->json([
                "statut" => false,
                "message" => "Le post n'existe pas"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        if ($post) {
            return response()->json([
                "statut" => true,
                "message" => "Le post a bien été ajouté avec success",
                "Post" => $post,
            ]);
        } else {
            return response()->json([
                "statut" => false,
                "message" => "Le post n'a pas été ajouté"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (!$post) {
            return response()->json([
                "statut" => false,
                "message" => "Le post n'existe pas"
            ]);
        } else {
            return response()->json([
                "statut" => true,
                "Post" => $post,
            ]);
        }
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
        if ($post->update($request->all())) {
            return response()->json([
                "statut" => true,
                "message" => "Le post a été mise ajour avec success",
                "Post" => $post,
            ]);
        } else {
            return response()->json([
                "statut" => false,
                "message" => "Le post n'a pas été mise a jour"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->delte()) {
            return response()->json([
                "statut" => true,
                "message" => "Le post a été supprimé avec success",
                "Post" => $post,
            ]);
        } else {
            return response()->json([
                "statut" => false,
                "message" => "Le post n'a pas été supprimé"
            ]);
        }
    }
}
