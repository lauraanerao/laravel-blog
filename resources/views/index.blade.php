@extends('blog-layout.main')

@section('title')
    {{ config('app.name') }}
@endsection

@section('header-title')
    Últimos Posts
@endsection

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{!! $post->descricaoPost(80) !!} </h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 24, 2022
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
