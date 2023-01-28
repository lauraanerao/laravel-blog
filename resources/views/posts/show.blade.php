@extends('blog-layout.main')

@section('title')
    {{ $post->title }}
@endsection

@section('header-title')
{{$post->title}}
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

            </div>
        </div>
    </div>
@endsection
