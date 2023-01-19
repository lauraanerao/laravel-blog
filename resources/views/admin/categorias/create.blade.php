@extends("blog-layout.main")

@section('title')
    Criar Categoria
@endsection

@section('header-title')
    Criar Nova Categoria
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

                <form method="post" action="{{ route('categorias.store') }}">
                    @csrf

                    <label for="nome">Nome da Categoria</label>
                    <input required id="nome" class="form-control" name="nome" value="{{ old('nome') }}">

                    <br>

                    <button style="width: 100%" type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
        </div>
    </div>
@endsection
