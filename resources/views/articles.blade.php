@extends('layouts.app')

@section('content')

    <div class="jumbotron mt-5 mb-5">
        <div class="container">
            @if(isset($t) && $t)
                <h1 class="display-4">Материалы тега: {{ $t->title }}</h1>
            @else
                <h1 class="display-4">Каталог статей</h1>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div id="tags">
                    <h2 class="mb-5 mt-5">Теги</h2>
                    @if ($tags)
                        @foreach($tags as $tag)
                            <a href="/tags/{{ $tag->slug }}" class="badge bg-secondary tag mb-1 @if(isset($t) && $t->id === $tag->id) {{ 'current'  }} @endif">{{ $tag->title  }}</a>
                        @endforeach
                            <hr>
                            <a href="/articles" class="badge btn btn-dark tag mb-1 @if(!isset($t)) {{ 'current'  }} @endif">Все теги</a>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                @if(isset($articles))

                    <div id="articles">
                        @foreach($articles as $article)

                            <div class="mb-5">
                                @include('layouts.cardarticle', $article)
                            </div>


                        @endforeach
                    </div>
                    {{$articles->links()}}

                @endif
            </div>
        </div>


    </div>
@endsection
