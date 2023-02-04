@extends('blog-layout.main')

@section('title')
    {{ $post->title }}
@endsection

@section('css')
    <style>


        .box {

            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }



        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup .close:hover {
            color: #06D85F;
        }

        .popup .content {
            max-height: 30%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }
    </style>
@endsection

@section('header-title')
{{$post->title}}
@endsection

@section('header-desc')
    {{ $post->categoria->nome }}
@endsection

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <div class="post-preview">
                    <p>{!! nl2br($post->body) !!}</p>

                    <p class="post-meta">
                        Posted by
                        {{ $post->usuario->name }}
                        on {{ $post->created_at }}
                    </p>
                </div>

                @auth
                <div class="box">
                    <a class="btn btn-danger btn-sm float-end" href="#popup1"> <i class="fa fa-trash"></i> Remover Post </a>

                    <a href="{{ route("posts.edit", $post->id) }}">
                        <button class="btn btn-primary btn-sm float-end" style="margin-right: 5px"><i class="fa fa-edit"></i> Editar</button>
                    </a>


                </div>

                <div id="popup1" class="overlay">
                    <div class="popup">
                        <h2>Deseja remover esse post?</h2>
                        <a class="close" href="#">&times;</a>
                        <div class="content">
                            Esta ação não poderá ser desfeita!<br><br>

                            <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                                @method('DELETE') @csrf
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth


            </div>
        </div>
    </div>
@endsection
