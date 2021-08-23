<?php

namespace App\Http\Controllers\Admin;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->with('user')->paginate(9);
        $users = User::where($posts)->with('user');
        if (Auth::check()) {
            return view('blog', compact('posts', 'users'));
        }
        return redirect('/');
    }

    public function create()
    {
        $post = new Post();
        $users = User::all();
        if (Auth::check()) {
            return view('articles.form', compact('post', 'users'));
        }
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $request->validate([
            // 'users' => 'required|exists:users,id',
            'title' => 'required|max:255',
            'subtitle' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
        ]);
        // Toastr::success("L'article a été créée avec succès !");
        Toastr::success('message', 'L\'article a été créée avec succès !');
        // $request->session()->flash('success', 'L\'article a été créée avec succès !');  
        return redirect()->route('blog.index', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            // Toastr::error('Cet article n\'existe pas');
            return redirect()->view('blog', compact('post'));
        }
        return view('articles.index', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            // Toastr::error('Cette tâche n\'existe pas ou a été supprimée');
            return redirect()->route('articles.index');
        }
        // $clients = User::whereHas('roles',function($query){
        //     return $query->where('slug','user');
        // })->get();
        return view('articles.form', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            Toastr::error('Cet article n\'existe pas ou a été supprimée');
            return redirect()->route('admin.taskboards.index');
        }
        $request->validate([
            // 'users' => 'required|exists:users,id',
            'title' => 'required|max:255',
            'subtitle' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],

        ]);
        $post->update([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
        ]);
        Toastr::success('L\'article a été mise a jour avec succès !');

        return redirect()->route('blog.index', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
    }
}
