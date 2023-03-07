<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    public function create() {


        $categorias = Categoria::all();

        return view("admin.posts.create", compact('categorias'));

    }

    public function store(PostRequest $request) {

        $data = $request->validated();

        if($request->file('thumbnail')){
            $path = $request->file('thumbnail')->store('posts');
            $data['thumbnail'] = $path;
        }

        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']);


        Post::create($data);
        return back()->with('sucesso', 'Post cadastrado com sucesso!');
    }

    public function destroy(Post $post) {

       $post->delete();
       return redirect(route('index'))->with('sucesso', 'Post excluído com sucesso!');

    }

    public function edit(Post $post) {

        $categorias = Categoria::all();
        return view("admin.posts.edit", compact("post","categorias"));
    }

    public function update(PostRequest $request, Post $post) {
        $data = $request->validated();
        if($request->file('thumbnail')){
            $path = $request->file('thumbnail')->store('posts');
            $data['thumbnail'] = $path;
        }
        else{
            $data['thumbnail'] = $post->thumbnail;
        }
        $post->update($data);
        return back()->with('sucesso', 'Post editado com sucesso!');

    }
}
