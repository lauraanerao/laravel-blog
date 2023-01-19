<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Str;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function create(){


        return view("admin.categorias.create");

    }

    public function store(CategoriaRequest $request){

        $data = $request->validated();
        $data['slug'] = Str::slug($data['nome']);
        Categoria::create($data);
        return back()->with('sucesso', 'Categoria cadastrada com sucesso!');
    }
}
