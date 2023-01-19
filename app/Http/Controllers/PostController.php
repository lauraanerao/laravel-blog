<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
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
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']);
        Post::create($data);
        return back()->with('sucesso', 'Post cadastrado com sucesso!');
    }
}
