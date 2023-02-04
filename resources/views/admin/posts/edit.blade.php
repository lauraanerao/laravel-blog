@extends("blog-layout.main")

@section('title')
    Editar Post
@endsection

@section('header-title')
    Editar Post
@endsection

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif

                @if(session('sucesso'))
                    <div class="alert alert-success text-center">
                        {{ session('sucesso') }}
                    </div>
                @endif

                <form method="post" action="{{ route('posts.update', $post->id) }}">
                    @csrf @method('patch')
                    <label for="category">Categoria</label>
                    <select id="category" name="category_id" class="form-control">
                        <option value=""> Escolha a Categoria </option>
                        @foreach($categorias as $categoria)
                            <option {{ $categoria->id == $post->category_id ? 'selected' : '' }} value="{{ $categoria->id}}"> {{ $categoria->nome }} </option>
                        @endforeach
                    </select>
                    <br>

                    <label for="title">Título</label>
                    <input id="title" class="form-control" name="title" value="{{ old('title') ?: $post->title }}">

                    <br>

                    <label for="body">Descrição</label>
                    <textarea id="body" class="form-control" rows="8" name="body">{{ old('body') ?: $post->body }}</textarea>

                    <br>
                    <button style="width: 100%" type="submit" class="btn btn-primary">Editar</button>

                </form>
            </div>
        </div>
    </div>
@endsection

