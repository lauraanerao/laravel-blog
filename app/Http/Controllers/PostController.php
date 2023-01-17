<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    public function create() {

        $categorias = Categoria::all();

        return view("admin.posts.create", compact('categorias'));

    }

    public function store() {

    }
}
