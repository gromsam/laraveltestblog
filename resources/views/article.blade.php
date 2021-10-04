@extends('layouts.app')

@section('content')

    <div class="jumbotron mt-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4">{{ $article->title }}</h1>
            </div>
            <div class="mt-3">
                <h5>Теги:</h5>
                @foreach($article->tags as $tag)
                    <a href="/tags/{{ $tag->slug }}" class="badge bg-secondary tag mb-1">{{ $tag->title  }}</a>
                @endforeach
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="mt-3 d-flex align-items-center gap-3">
                    <card-like
                        :count="{{ $article->like }}"
                        :post_id="{{ $article->id }}"
                    ></card-like>

                    <auto-article-view
                        :post_id="{{ $article->id }}"
                        :count_view="{{ $article->view }}"
                    ></auto-article-view>

                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-md-12">
                {!! $article->text !!}
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <comment
                    post_id="{{ $article->id }}"
                    list="{{ $article->comments }}"
                ></comment>
            </div>
        </div>


    </div>
@endsection
